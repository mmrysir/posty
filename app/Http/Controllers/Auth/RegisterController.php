<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    public function  __construct()
    {
        $this->middleware(['guest']);
    }
    public  function index()
{
    return view('Auth.register');

}




public  function store(Request $request)
{
    //validation

    $this->validate($request,[
        'name' => ['required', 'string', 'max:255'],
        'username' => ['required', 'string', 'max:255'],
        'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
        //'password' => ['required','confirmed'],

    ]);

    User::create([
        'name'=>$request->name,
        'username'=>$request->username,
        'email'=>$request->email,
        'password'=>Hash::make($request->password),

    ]);
    //sign in type user
 auth()->attempt($request->only('email','password'));
    //redirect

    return redirect()->route('dashboard');
}
}
