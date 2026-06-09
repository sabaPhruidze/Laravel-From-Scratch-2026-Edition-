<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rules\Password;

class SessionsController extends Controller
{
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('auth.login');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //validate
        //dd($request->all()); ეშვება თუ არა
        $validated = $request->validate([
            'email' => ['required', 'string', 'email', 'max:255'],
            'password' => ['required', Password::default()],
        ]);
        //attempt a login
        if (Auth::attempt($validated)) {
            $request->session()->regenerate();
            //redirect
            return redirect('/');
            // return redirect('/')->with('success','Your are logged in') ესე შემეძლო მესიჯიც გამეტანებინა
        }
        return back()->withErrors([
            'email' => 'provided credentials do not match out records',

        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy()
    {
        Auth::logout();
        return redirect('/register');
    }
}
