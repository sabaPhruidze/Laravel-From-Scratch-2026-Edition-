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
        /**
         * Laravel ელოდება, რომ $user აუცილებლად იყოს User ობიექტი.
         * თუ მომხმარებელი არ არის დალოგინებული,
         * $user იქნება null და Gate ავტომატურად უარს ამბობს ავტორიზაციაზე.
         * მაგრამ ?User ნიშნავს: User | null და რადგან შენ ყოველთვის true-ს აბრუნებ:@can('view-admin') იღებს true-ს და აჩვენებს HTML-ს.
         */
        Gate::define('view-admin', function (User $user) { //?Uსser გახადა არცევითი ამით can ის მიხედავად ხელმისაწვდომი გახადა admin
            return true;
        });
    }
}
