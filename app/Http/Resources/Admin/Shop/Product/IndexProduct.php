<?php

namespace App\Http\Resources\Admin\Shop\Product;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\ResourceCollection;

class IndexProduct extends ResourceCollection
{
    /**
     * Transform the resource collection into an array.
     *
     * @return array<int|string, mixed>
     */
    public function toArray(Request $request): array
    {
        $this->collection = isset($this->collection['data']) ? $this->collection['data'] : $this->collection;
        return $this->collection->transform(function($item){
            return [
                'id' => $item->id,
                'title' => $item->title,
                'price' => $item->price,
                'status' => $item->status,
                'categories' => $item->categories,
                'created_at' => $item->created_at,
                'updated_at' => $item->updated_at,
            ];
        })->toArray();
    }
}
