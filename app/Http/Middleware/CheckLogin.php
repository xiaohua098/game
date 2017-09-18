<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Session;
class CheckLogin
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
//            if(!session::get('mid')){
//                return redirect('guanli/login');
//            }
    $url=ltrim($_SERVER['REQUEST_URI'],'/');
    session::put('power',array('user/list','auth/list','auth/add','auth/edit','auth/del'));
    $power=session::get('power');
       if(in_array($url,$power)){
           return $next($request);
       }else{
           return redirect('guanli/login');
       }
    }
}
