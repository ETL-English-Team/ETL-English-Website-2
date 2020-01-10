<?php

namespace App\Http\Middleware;

use Illuminate\Routing\UrlGenerator;
use Closure;
use Session;

class CheckUserLogin
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
        $url_login = 'http://localhost/ETL-English-Website/public/login';
        if (!session()->get('username') && url()->current()!=$url_login){
            return redirect('login')->with('thongbaoloi', 'Bạn chưa đăng nhập');
        }
        elseif (session()->get('username') && url()->current()==$url_login){
            return redirect('home');
        }
        else{
            return $next($request);
        }
    }
}
