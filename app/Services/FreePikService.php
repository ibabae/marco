<?php

namespace App\Services;

use App\Models\Product;
use App\Services\ServiceBaseClass;
use Illuminate\Support\Facades\Http;


class FreePikService extends ServiceBaseClass
{
    public function __construct(
        protected FileDataService $fileService
    ){

    }
    public function generateImage($model)
    {
        $tags = implode(', ',collect($model->tags)->pluck('name')->toArray());
        // // dd($model->title,$tags,$model->categories->first()->title);
        // $response = Http::withHeaders([
        //     'Content-Type' => 'application/json',
        //     'x-freepik-api-key' => env('FREEPIK_API_KEY'),
        // ])->post('https://api.freepik.com/v1/ai/text-to-image', [
        //     'prompt' => $model->title. 'image',
        //     'negative_prompt' => $tags,
        //     'guidance_scale' => 2,
        //     'seed' => 42,
        //     'num_images' => 1,
        //     'image' => [
        //         'size' => 'square',
        //     ],
        //     'styling' => [
        //         'style' => $model->categories->first()->title,
        //         'color' => 'pastel',
        //         'lightning' => 'warm',
        //         'framing' => 'portrait',
        //     ],
        // ]);

        $response = Http::withHeaders([
            'Content-Type' => 'application/json',
            'x-freepik-api-key' => env('FREEPIK_API_KEY'),
        ])->post('https://api.freepik.com/v1/ai/text-to-image', data: [
            'prompt' => $model->title,
            'negative_prompt' => $tags,
            'guidance_scale' => 2,
            'seed' => 42,
            'num_images' => 1,
            'image' => [
                'size' => 'square',
            ],
            'styling' => [
                'style' => 'anime',
                'color' => 'pastel',
                'lightning' => 'warm',
                'framing' => 'portrait',
            ],
        ]);

        if ($response->successful()) {

            $image = 'data:image/png;base64,'.$response->json()['data'][0]['base64'];

            $this->fileService->createFile($image, $model);
        } else {
            return null;
        }
    }

}
