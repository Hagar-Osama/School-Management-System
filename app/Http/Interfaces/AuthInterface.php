<?php
namespace App\Http\Interfaces;

use App\Http\Requests\AuthRequest;
use Illuminate\Http\Request;

interface AuthInterface {

    public function chooseloginForm($type);

    // public function signinPage();

    public function login($request);

    public function signout($type);
}
