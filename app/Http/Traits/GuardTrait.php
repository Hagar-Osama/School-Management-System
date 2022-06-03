<?php
namespace App\Http\Traits;

use App\Providers\RouteServiceProvider;

trait GuardTrait {

    public function checkGuard($request)
    {
        if($request->type == 'student') {
            $guardName = 'student';

        }elseif($request->type == 'teacher') {
            $guardName = 'teacher';

        }elseif($request->type == 'parent') {
            $guardName = 'parent';

        }else {
            $guardName = 'web';

        }
        return $guardName;
    }

    public function redirect($request)
    {
        if($request->type == 'student') {
            return redirect('/student/dashboard');

        }elseif($request->type == 'teacher') {
            return redirect('/teacher/dashboard');

        }elseif($request->type == 'parent') {
            return redirect()->intended(RouteServiceProvider::PARENTS);

        }else {
            return redirect('/dashboard');

        }
    }
}
