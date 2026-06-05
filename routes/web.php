<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
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