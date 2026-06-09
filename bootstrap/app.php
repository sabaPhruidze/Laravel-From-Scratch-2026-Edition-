<?php
// აქ იქმნება Laravel-ის მთავარი application instance.
//ეს application იყენებს ძალიან მნიშვნელოვან ნაწილს:
//Service Container
//Service Container არის Laravel-ის „საწყობი“
//ან „მართვის ცენტრი“. მარტივად რომ ვთქვათ:
//Laravel აქ ინახავს და მართავს საჭირო ობიექტებს/სერვისებს.

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;
use Illuminate\Http\Request;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__ . '/../routes/web.php',
        commands: __DIR__ . '/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware): void {
        $middleware->redirectGuestsTo('login');
        // ამით როცა middleware ით დაცულ გვერდზე შევ მომხმარებელი
        //თუ ავტორიზებული არ იქნება login გვერდზე გაუშვებს
        $middleware->redirectUsersTo('/ideas/index');
        //ეს დალოგინებუს გადაამისამართებს /ideas/index ზე თუ ეცდება აკრძალულ
        // გვერდზე შესვლაზე

    })
    ->withExceptions(function (Exceptions $exceptions): void {
        $exceptions->shouldRenderJsonWhen(
            fn(Request $request) => $request->is('api/*'),
        );
    })->create();
