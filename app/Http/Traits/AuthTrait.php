<?php

namespace App\Http\Traits;

use App\Providers\RouteServiceProvider;

trait AuthTrait
{
    public function chekGuard($request)
    {

        if ($request->type == 'student') {
            $guardName = 'student';
        } elseif ($request->type == 'parent') {
            $guardName = 'parent';
        } elseif ($request->type == 'teacher') {
            $guardName = 'teacher';
        } else {
            $guardName = 'web';
        }
        return $guardName;
    }

    public function redirect($request)
    {

        if ($request->type == 'student') {
            toastr(trans('message.student'));
            return redirect()->intended(RouteServiceProvider::STUDENT);
        } elseif ($request->type == 'parent') {
            toastr(trans('message.parent'));
            return redirect()->intended(RouteServiceProvider::PARENT);
        } elseif ($request->type == 'teacher') {
            toastr(trans('message.teacher'));
            return redirect()->intended(RouteServiceProvider::TEACHER);
        } else {
            toastr(trans('message.admin'));
            return redirect()->intended(RouteServiceProvider::HOME);
        }
    }
}
