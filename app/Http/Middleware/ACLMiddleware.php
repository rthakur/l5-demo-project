<?php

namespace App\Http\Middleware;

use Closure,Auth,Request;

class ACLMiddleware
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

      if(Auth::check()){
          $role = Auth::user()->role_id;
          $currentUrl = Request::segment(1);

          //if teammember try to access users management
          if($role == '5' && $currentUrl == 'user')
            return redirect('filemanager');


        }
      return $next($request);
    }
}
