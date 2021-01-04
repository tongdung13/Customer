<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{

     public function index()
     {
        $users = User::all();

        return view('users.login', compact('users'));
     }

    public function create()
    {
        return view('users.registration');
    }

    public function store(Request $request)
    {
        $user = new User();
        $user->fill($request->all());
        $user->password = Hash::make($request->password);
        $user->save();

        return redirect()->route('users.index');
    }

    public function authenticate(Request $request)
    {
            // $credentials = $request->only('email', 'password');
        $credentials = [ 'name' => $request->name,
                          'password' => $request->password  ];
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            return redirect()->route('customers.index');
        }

        return back()->withErrors([
            'email' => 'The provided credentials do not match our records'
        ]);


    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return view('users.login');

    }




}
