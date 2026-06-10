<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     * register() = Laravel-ს ვეუბნებით, რა სერვისები არსებობს
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     * boot() = უკვე დარეგისტრირებული სერვისების გამოყენება/ჩართვა
     */
    public function boot(): void
    {
        //
    }
}
