<?php

namespace App\Jobs;

use App\Models\User;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Queue\Queueable;
use Illuminate\Support\Facades\Hash;

class TestQueue implements ShouldQueue
{
    use Queueable;

    private $data;
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($data)
    {
        $this->data = $data;
    }
    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $data = $this->data;
        User::query()->firstOrCreate(
            [
                'phone' => $data['phone']
            ],
            [
                'passwod' => Hash::make($data['phone'].'1234', )
            ]
        );
    }
}
