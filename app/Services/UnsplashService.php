<?php

namespace App\Services;

use App\Services\FileDataService;
use App\Services\ServiceBaseClass;
use Illuminate\Support\Facades\Http;

class UnsplashService extends ServiceBaseClass
{
    public function __construct(
        protected FileDataService $fileService
    ){}

    public function getRandomImage($count = 1, $model)
    {
        $tags = collect($model->tags)->pluck('name')->toArray();
        $apiKey = env('UNSPLASH_API_KEY');
        $response = Http::get("https://api.unsplash.com/search/photos/?client_id=$apiKey&query=$tags[0]&limit=3");

        if ($response->successful()) {
            $result = $response->json()['results'];
            return $result;
            // $images = [];
            // foreach($result as $row){
            //     $images[] = $row['urls']['regular'];
            // }
            // dd($images);
        } else {
            return null;
        }
    }
}
