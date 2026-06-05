<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
// shortly written 
Route::view('/about','about',[
    'greeting' => 'About us'
]);
// greeting is like a prop that pass it's data by writing that 
//$greeting
Route::view('/contact','contact');
