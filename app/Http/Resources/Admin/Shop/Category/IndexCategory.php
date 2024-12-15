<?php

namespace App\Http\Resources\Admin\Shop\Category;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class IndexCategory extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return $this->resource->transform(function($item){
            $subLevels = $item->subLevels->map(function ($item) {
                return new CategoryTree($item);
            });
            return [
                "id" => $item->id,
                "title" => $item->title,
                "description" => $item->description,
                "parent_id" => $item->parent_id,
                "attributes" => $item->attributes,
                    /**
                 * SubLevels of Category
                 * @var array<string, CategoryTree>
                 */
                "sub_levels" => $subLevels
            ];
        })->toArray();
    }
}
