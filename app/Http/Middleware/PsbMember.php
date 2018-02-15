<?php

namespace App\Http\Middleware;

use Auth;
use Closure;
use App\User;
use Illuminate\Contracts\Auth\Guard;

class PsbMember
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

        if ( Auth::user()->hasRole('psb member') || Auth::user()->hasRole('Admin') )
        {
            return $next($request);
        }

        return redirect()->route('home')->with('unauthorize', 'Sorry, you have no administrator privileges to perform this action.');

    }
}