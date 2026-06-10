<?php

namespace App\Providers;

use App\Models\User;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\ServiceProvider;
//თუ Laravel-ში რაღაცას ასე იყენებ: Gate, auth,Route, DB, cache:
//ხშირად ეს არის Facade, და import ასეთ ადგილას იქნება:Illuminate\Support\Facades\...
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
        //authorization rules
        /*
        შექმენი authorization rule სახელად view-admin. როცა Laravel შეამოწმებს, აქვს თუ არა მომხმარებელს view-admin უფლება, გაუშვებს ამ ფუნქციას:
        $user არის ამჟამად შესული მომხმარებელი.
        ყველა logged-in user შეძლებს view-admin მოქმედებას.
        */
        Gate::define('view-admin', function (User $user){
            return true;
        });
    }
}
