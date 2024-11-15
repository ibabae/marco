<?php

namespace App\Repositories;

use Illuminate\Support\Facades\Storage;
use Intervention\Image\ImageManagerStatic as Image;


class FileDataRepo
{
    public function create($fileData, $model, $fit, $resize)
    {
        $filePath = $this->fileConstructor($fileData, $model, $fit, $resize);

        $model->file()->create([
            'path' => $filePath,
        ]);
    }

    public function delete($model)
    {
        if (isset($model->file->path)) {
            Storage::delete($model->file->path);
        }
        return $model->file()->delete();
    }

    private function fileConstructor($fileData, $model, $fit, $resize){
        $prefix = class_basename($model);
        $format = $fileData->getClientOriginalExtension();
        $fileName = $prefix.'-'.$model->id.'-'.time().'.'.$format;
        $filePath = "uploads/$prefix/$fileName";

        $images = ['jpg','png','gif','jpeg'];
        if(in_array($format ,$images)){
            $fileData = Image::make($fileData)->encode($format, 100);
            $fileData->resize($resize[0], $resize[1], function ($constraint) {
                $constraint->aspectRatio();
                $constraint->upsize();
            })->fit($fit[0], $fit[1]);
        }

        Storage::put($filePath, $fileData);
        return $filePath;
    }
}
