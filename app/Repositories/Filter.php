<?php

namespace App\Repositories;

use App\Exceptions\InvalidFilterTypeException;
use Illuminate\Database\Eloquent\Builder;

use function PHPUnit\Framework\isEmpty;

class Filter extends Paginate
{
    public function filtering(Builder $query): Builder
    {
        $filter = $this->splitFilters();
        if (isempty($filter)) {
            return $query;
        }
        foreach ($filter as $value) {
            if (str_contains($value[0], '.')) {
                $query = $this->advFilter($value, $query);
            } else {
                $query = $this->sampleFilter($value, $query);
            }

        }

        return $query;
    }

    public function sorting(Builder $query, array $sort): Builder
    {
        return $query->orderBy($sort[0], $sort[1]);
    }

    private function splitFilters()
    {
        $filters = request()->filters;
        $filters = explode('|', $filters);
        foreach ($filters as &$filter) {
            $filter = explode(',', $filter);
        }

        return $filters;
    }

    /**
     * @return Builder
     *
     * @throws InvalidFilterTypeException
     */
    public function sampleFilter($value, Builder $query)
    {
        match ($value[1]) {
            '==' => $query->where($value[0], '=', $value[2]),
            '<' => $query->where($value[0], '<', $value[2]),
            '>' => $query->where($value[0], '>', $value[2]),
            '<=' => $query->where($value[0], '<=', $value[2]),
            '>=' => $query->where($value[0], '>=', $value[2]),
            '!=' => $query->where($value[0], '!=', $value[2]),
            '^' => $query->where($value[0], 'LIKE', '%'.$value[2].'%'),
            default => throw new InvalidFilterTypeException(),
        };

        return $query;
    }

    private function advFilter($value, Builder $query)
    {
        [$model, $column] = explode('.', $value[0]);
        $query->whereHas($model, function (Builder $query) use ($value, $column) {
            switch ($value[1]) {
                case '==':
                    $query->where($column, '=', $value[2]);
                    break;
                case '<':
                    $query->where($column, '<', $value[2]);
                    break;
                case '>':
                    $query->where($column, '>', $value[2]);
                    break;
                case '<=':
                    $query->where($column, '<=', $value[2]);
                    break;
                case '>=':
                    $query->where($column, '>=', $value[2]);
                    break;
                case '!=':
                    $query->where($column, '!=', $value[2]);
                    break;
                case '^':
                    $query->where($column, 'LIKE', '%'.$value[2].'%');
                    break;
                default: throw new InvalidFilterTypeException();
            }
        });

        return $query;
    }
}
