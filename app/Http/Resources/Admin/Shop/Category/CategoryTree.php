<?php

namespace App\Http\Resources\Admin\Shop\Category;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class CategoryTree extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        $subLevels = $this->resource->subLevels->map(function ($item) {
            return new CategoryTree($item);
        });
        return [
            "id" => $this->resource->id,
            "title" => $this->title,
            "description" => $this->description,
            "parent_id" => $this->parent_id,
            /**
             * SubLevels of Category
             * @var array<string, CategoryTree>
             */
            "sub_levels" => $subLevels
        ];

    }
}
