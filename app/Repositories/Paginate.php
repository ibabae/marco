<?php

namespace App\Repositories;

use App\Exceptions\InvalidFilterTypeException;
use Illuminate\Database\Eloquent\Builder;

use function PHPUnit\Framework\isEmpty;

class Paginate
{

    public function pagination($model)
    {
        $perPage = (int) request()->input('per_page', 30);
        $currentPage = (int) request()->input('page', 1);
        $skip = ($currentPage - 1) * $perPage;
        $data = $model->skip($skip)->take($perPage)->get();
        $total = $model->count();
        return [
            'current_page' => $currentPage,
            'data' => $data,
            'per_page' => $perPage,
            'last_page' => ceil($total / $perPage),
            'from' => $skip + 1,
            'to' => min($skip + $perPage, $total),
            'total' => $total,
        ];
    }
}
