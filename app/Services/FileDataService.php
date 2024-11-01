<?php

namespace App\Services;

use App\Repositories\FileDataRepo;

class FileDataService
{
    public function __construct(protected FileDataRepo $file){}

    public function createFile($file, $model, $fit = [null,null], $resize = [null,null])
    {
        return $this->file->create($file, $model, $fit, $resize);
    }

    public function deleteFile($model)
    {
        return $this->file->delete($model);
    }
}
