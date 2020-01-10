<?php

namespace App\Http\Middleware;

use Closure;
use App\User;

class CheckAdminLogin
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
        if (session()->get('username')){
            $username = session()->get('username');
            $user_id = session()->get('user_id');
            $user = User::getUserByUsername($username);
            $admin = $user->admin;
        }
        $url_login = 'http://localhost/ETL-English-Website/public/admin/login';

        if (!session()->get('username') && url()->current()!=$url_login){
            return redirect('admin/login')->with('thongbaoloi', 'Bạn chưa đăng nhập');
        }
        elseif (session()->get('username') && url()->current()==$url_login && $admin==1){
            return redirect('admin/home');
        }
        elseif (session()->get('username') && $admin==0){
            return redirect('login');
        }
        else{
            return $next($request);
        }
    }
}
