<?php

namespace App\Repositories\Shop;

use App\Models\Attribute;
use App\Repositories\RepositoryBaseClass;
use App\Repositories\RepositoryInterface;
use Illuminate\Support\Facades\DB;

class AttributeRepo extends RepositoryBaseClass implements RepositoryInterface
{
    public function __construct(
        protected Attribute $attribute
    ){}

    public function all(){
        if(request()->categories){
            return Attribute::select('attributes.*', DB::raw('COALESCE(usage_counts.usage_count, 0) as usage_count'))
                ->leftJoin(DB::raw("(SELECT product_attributes.attribute_id, COUNT(*) as usage_count
                    FROM product_attributes
                    JOIN products ON product_attributes.product_id = products.id
                    JOIN product_categories ON products.id = product_categories.product_id
                    WHERE product_categories.category_id IN (".request()->categories.")
                    GROUP BY product_attributes.attribute_id
                    ) as usage_counts"), 'attributes.id', '=', 'usage_counts.attribute_id')
                ->orderByDesc('usage_count')
                ->get();
        }
        return $this->attribute->orderBy('id','desc')->get();
    }

    public function create(array $data){
        return collect($data['attributes'])->mapWithKeys(function ($attribute) {
            $attributeModel = Attribute::firstOrCreate([
                'name' => $attribute['name'],
                'slug' => \Str::slug($attribute['name'])
            ]);

            return [
                $attributeModel->id => ['value' => $attribute['value']]
            ];
        });
    }

    public function find($id){

    }

    public function update(array $data, $id){

    }

    public function delete($id){

    }

}
