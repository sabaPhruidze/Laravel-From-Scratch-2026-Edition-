<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
Route::get('/prisma',function() {
    return view('prisma',[
        'greeting' => 'hello',
        'person' => request('person','world'),
        // თუ link ში არ არის person ის განმარტება ჩაწერს worldს
    ]);
});
// shortly written
Route::view('/about','about',[
    'greeting' => 'About us',
    'owner' => 'Saba Ph'
]);
// greeting is like a prop that pass it's data by writing that
//$greeting
Route::view('/contact','contact',[
    'phone' => request('number')
]);
// query string ში რომ ჩანდეს და ის ამოვიღოთ მაგ: ?person=frank
Route::get('/tasks',function() {
    return view('tasks',[
        'tasks' => [
            'Go to the market',
            'Walk the dog',
            'Match a video toturial'
        ],
    ]);
});
Route::get('/additional-tasks',function() {
    return view('additional-tasks',[
        'tasks' => [
            'Go to the market',
            'Walk the dog',
            'Match a video toturial'
        ],
        'addTasks' => [],
    ]);
});
Route::view('/forms','forms');
