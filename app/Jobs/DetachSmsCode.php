<?php

namespace App\Jobs;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Queue\Queueable;

class DetachSmsCode implements ShouldQueue
{
    use Queueable;

    protected $model;

    /**
     * Create a new job instance.
     */
    public function __construct($model)
    {
        $this->model;
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        $this->model->delete();
    }
}
