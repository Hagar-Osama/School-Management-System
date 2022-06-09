<?php
namespace App\Http\Repositories;

use App\Http\Interfaces\AuthInterface;
use App\Http\Requests\AuthRequest;
use App\Http\Traits\GuardTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class AuthRepository implements AuthInterface
{
    use GuardTrait;
    
     public function chooseloginForm($type)
    {
        return view('auth.login', compact('type'));
    }

    // public function signinPage()
    // {
    //     return view('signin');
    // }

   

    public function login($request)
    {
        $adminData = $request->only('email', 'password');
        if(auth()->guard($this->checkGuard($request))->attempt($adminData)) {
            $request->session()->regenerate();
           return $this->redirect($request);
            // return redirect()->intended('/'); //intended method takes url not route name
        }
        return back()->withErrors([
            'email' => 'The Provided Credentials Do Not Match Our Records.',
            'password' => 'The Provided Password Does Not Match Our Records.',

        ]);
        // session()->flash('error', 'The provided credentials do not match our records.');
        // return redirect()->back();
    }

    public function signout($type)
    {
        Session::flush();
        Auth::guard($type)->logout();
        return redirect(route('selectionPage'));
    }
}
