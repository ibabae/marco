<?php

namespace App\Repositories;

use Illuminate\Support\Facades\Storage;
use Intervention\Image\ImageManagerStatic as Image;


class FileDataRepo
{
    public function create($fileData, $model, $fit, $resize)
    {
        $prefix = class_basename($model);
        $fileName = $prefix.'-'.$model->id.'-'.time().'.'.$fileData->getClientOriginalExtension();

        $filePath = "uploads/$prefix/$fileName";
        $img = Image::make($fileData)->encode('jpg', 100);
        $img->resize($resize[0], $resize[1], function ($constraint) {
            $constraint->aspectRatio();
            $constraint->upsize();
        })->fit($fit[0], $fit[1]);
        Storage::put($filePath, $img);

        $model->file()->create([
            'url' => $filePath,
        ]);
    }

    public function delete($model)
    {
        if (isset($model->file->url)) {
            Storage::delete($model->file->url);
        }

        return $model->file()->delete();
    }
}
