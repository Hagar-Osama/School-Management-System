<?php
namespace App\Http\Repositories;

use App\Http\Interfaces\AuthInterface;
use App\Http\Requests\AuthRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class AuthRepository implements AuthInterface
{
    
     public function chooseloginForm($type)
    {
        return view('auth.login', compact('type'));
    }

    // public function signinPage()
    // {
    //     return view('signin');
    // }

   

    public function signin($request)
    {
        $adminData = $request->only('email', 'password');
        if(auth()->attempt($adminData)) {
            $request->session()->regenerate();
            return redirect()->intended('/'); //intended method takes url not route name
        }
        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ]);
        // session()->flash('error', 'The provided credentials do not match our records.');
        // return redirect()->back();
    }

    public function signout()
    {
        Session::flush();
        Auth::logout();
        return redirect(route('signin'));
    }
}
