<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
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
            'password' => ['required', 'min:8', Password::default()], // default ზე დაჭერით ზუსტად ვნახავ რა გაიწერა
        ]);
        //create the user in the db
        $user = User::create([
            //'name' => $request->name;
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password)
            //db ში პაროლი უნდა შევინახოთ hashრებული
        ]);
        //log them in
        Auth::login($user);
        //redirect home
        return redirect('/');
        //dd(request()->all()); ამით ყველაფერი რაც register.blade.php input ში ჩაიწერა გამოიტანა + ტოკენი
    }
}
