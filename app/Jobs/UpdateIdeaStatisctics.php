<?php

namespace App\Jobs;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Queue\Queueable;

class UpdateIdeaStatisctics implements ShouldQueue
{
    use Queueable; //ეს Trait Laravel-ს აძლევს დამატებით შესაძლებლობებს.
    //
    /**
     * Create a new job instance.
     */
    public function __construct()
    {
        //
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        logger('The UpdateJobStatistics job is being processed'); // როცა დალოგავს გამოჩნდება storage laravel.log_ში
    }
}
