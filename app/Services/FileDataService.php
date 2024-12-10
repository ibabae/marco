<?php

namespace App\Services;

use App\Repositories\FileDataRepo;

class FileDataService
{
    public function __construct(protected FileDataRepo $file){}

    public function createFile($file, $model, $fit = [1080,null], $resize = [1080,null])
    {
        return $this->file->create($file, $model, $fit, $resize);
    }

    public function deleteFile($model)
    {
        return $this->file->delete($model);
    }
}
