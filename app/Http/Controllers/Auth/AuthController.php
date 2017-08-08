<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Requests\UsersRequest;
use App\Http\Requests\UserRequestLogin;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;


class AuthController extends Controller
{
    public function getLogin(){
        if(Auth::user()!=null){
            return redirect()->route('admin.news.index');
        }
        $title='Đăng nhập';
    	return view('auth.login',['title'=>$title]);
    }

    public function postLogin(UserRequestLogin $request){
    	$username=$request->username;
    	$password=$request->password;
    	if(Auth::attempt(['username'=>$username,'password'=>$password])){
    		return redirect()->route('admin.news.index');
    	}else{
    		$request->session()->flash('msg','Sai tên đăng nhập hoặc mật khẩu !');
    		return redirect()->route('auth.auth.login');
    	}

    }
    public function logout(){
    	Auth::logout();
    	return redirect()->route('auth.auth.login');
    }
}
