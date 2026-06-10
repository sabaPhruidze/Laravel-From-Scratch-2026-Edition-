<?php
// აქ იქმნება Laravel-ის მთავარი application instance.
//ეს application იყენებს ძალიან მნიშვნელოვან ნაწილს:
//Service Container არის Laravel-ის „საწყობი“ ან „მართვის ცენტრი“.
//Laravel აქ ინახავს და მართავს საჭირო ობიექტებს/სერვისებს.

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;
use Illuminate\Http\Request;

//Application::configure იწყებს Laravel-ის მთავარი Application-ის კონფიგურაციას.
return Application::configure(basePath: dirname(__DIR__))
// route ფაილები აქ არის
    ->withRouting(
        web: __DIR__ . '/../routes/web.php',
        commands: __DIR__ . '/../routes/console.php',
        health: '/up',
    )
    // როცა middleware დაგჭირდება, ეს წესები გამოიყენე
    ->withMiddleware(function (Middleware $middleware): void {
        $middleware->redirectGuestsTo('login');
        // ამით როცა middleware ით დაცულ გვერდზე შევა მომხმარებელი
        //თუ ავტორიზებული არ იქნება login გვერდზე გაუშვებს
        $middleware->redirectUsersTo('/ideas/index');
        //ეს დალოგინებუს გადაამისამართებს /ideas/index ზე თუ ეცდება აკრძალულ
        // გვერდზე შესვლაზე

    })
    ->withExceptions(function (Exceptions $exceptions): void {
        // თუ error/exception მოხდება, როგორ მოიქცე
        $exceptions->shouldRenderJsonWhen(
            fn(Request $request) => $request->is('api/*'),
        );
    })->create(); //აქ უკვე იქმნება საბოლოო Application Instance.
