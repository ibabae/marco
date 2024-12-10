<?php

namespace App\Traits;

use Illuminate\Support\Facades\Request;

trait PaginateTrait
{
    public function paginateData($query)
    {
        if (request()->has('page')) {
            $perPage = (int) Request::input('per_page', 30);
            $currentPage = (int) Request::input('page', 1);
            $skip = ($currentPage - 1) * $perPage;

            $data = $query->skip($skip)->take($perPage)->get();
            $total = $query->count();

            return [
                'current_page' => $currentPage,
                'data' => $data,
                'per_page' => $perPage,
                'last_page' => ceil($total / $perPage),
                'from' => $skip + 1,
                'to' => min($skip + $perPage, $total),
                'total' => $total,
            ];
        } else {
            return $query->get();
        }
    }
}
