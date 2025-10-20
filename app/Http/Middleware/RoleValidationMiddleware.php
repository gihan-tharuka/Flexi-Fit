<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RoleValidationMiddleware
{
    public function handle(Request $request, Closure $next, ?String $role = null)
    {
        //check if a role passed and if the role is a valid role enum
        if (!$role || !\App\Enums\Role::fromkey($role)){
           abort(403,'Invalid role');
        }

        // check if user is logged in
        if (!auth()->check()) {
                return redirect()->route('login');
        }
//
//       //  check if user has the required role
        if (!auth()->user()->role) {
            return redirect()->route('login');
        }

        // check if the users role id exists in the role enum
        if (!\App\Enums\Role::fromValue(Auth()->user()->role->value)){
            return redirect()->route('login');
        }

        //check if the user has the passed role
        if (auth()->user()->role->value !== \App\Enums\Role::fromkey($role)->value ){
            abort(403, 'Unauthorized');
        }



            return $next($request);
    }
    }
