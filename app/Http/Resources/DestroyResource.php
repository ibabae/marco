<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class DestroyResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'message' => $this->resource['model']." ". __('lang.successfully')." ".__('lang.deleted'),
        ];
    }
}
