<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules\Password;

class RegisterUserController extends Controller
{
    public function create()
    {
        return view('auth.register');
    }

    public function store(Request $request) // give us the instance of the request
    {
        //validate the request
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255'],
            'email' => ['required', 'min:8', Password::default()], // default ზე დაჭერით ზუსტად ვნახავ რა გაიწერა
        ]);
        //create the user in the db
        //log them in
        //redirect home
        //dd(request()->all()); ამით ყველაფერი რაც register.blade.php input ში ჩაიწერა გამოიტანა + ტოკენი
    }
}
