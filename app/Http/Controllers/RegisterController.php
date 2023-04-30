<?php

namespace App\Http\Controllers;

// use App\Http\Requests\RegisterRequest;
use App\Models\User;

class RegisterController extends Controller
{
    public function create()
    {
        return view('auth.register');
    }

    public function store()
    {
        $attributes = request()->validate([
            'username' => 'required|max:255|min:2',
            'email' => 'required|email|max:255|unique:users,email',
//            'password' => 'required|min:5|max:255|confirmed',
//            Note: Using confirmed doesn't show error message at confirmation input field
            'password' => 'required|min:5|max:255',
            'confirm-password' => ['same:password'],
            'terms' => 'required'
        ]);
        $user = User::create($attributes);

        return back()
            ->with('success','User Created');
    }
}