<?php

namespace App\Http\Middleware;

use Auth;
use Closure;
use App\User;
use Illuminate\Contracts\Auth\Guard;

class CheckAdmin
{
    protected $auth;

    public function __construct(Guard $auth) {
        $this->auth = $auth;
    }

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {   
        $user = User::all()->count();

        if (!($user == 1)) {

            if (!Auth::user()->hasRole('System Admin') || !Auth::user()->__isAdmin == 1) //If user does //not have this role
            {
                return redirect()->route('home')->with('unauthorize', 'Sorry, you have no administrator privileges to perform this action.');
            }
        }

        return $next($request);
    }
}
