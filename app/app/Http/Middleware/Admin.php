<?php

namespace App\Http\Middleware;

use Closure;

class Admin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if(empty(auth()->user())){
            return redirect()->route('login');
        }
        if(auth()->user()->division === '0'){
            $this->auth = true;
        }else{
            $this->auth = false;    
        }

        if($this->auth === true){
            return $next($request);
        }else{
            return view('gym_home');
        }
        
    }
}
