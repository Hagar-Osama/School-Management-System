<?php

namespace App\Http\Controllers;

use App\Http\Interfaces\AuthInterface;
use App\Http\Requests\AuthRequest;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    private $authInterface;
    public function __construct(AuthInterface $auth)
    {
        $this->authInterface = $auth;

    }

    public function chooseloginForm($type)
    {
        return $this->authInterface->chooseloginForm($type);
    }

    // public function signinPage()
    // {
    //     return $this->authInterface->signinPage();
    // }

    public function login(AuthRequest $request)
    {
        return $this->authInterface->login($request);
    }

    public function signout($type)
    {
        return $this->authInterface->signout($type);
    }
}
