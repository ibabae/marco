<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class BaseResource extends JsonResource
{
    protected function getCollection()
    {
        return match(true) {
            isset($this->collection['data']) => $this->collection['data'],
            default => $this->collection,
        };
    }
}
