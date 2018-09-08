<?php

namespace App\Http\Middleware;

use Closure;
use Auth;
class adminLogin
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
        // 判断session中是否存用户数据
        // 如果存在访问后台 不存在请用户登录Auth::user()->name  session('name')
    	if(Auth::check() == false){
			return redirect('admin/login');
		}else{

			return $next($request);
		}



        // if (session('name')) {

        //     return $next($request);
        // }else{
        //     // 让用户登录

        //     return redirect('admin/login');
        // }
        
        
    }
}
