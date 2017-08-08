<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use App\Http\Requests\UsersRequest;
use App\Http\Requests\UserEditRequest;
use Illuminate\Support\Facades\Auth;

class UsersController extends Controller
{
    public function index(){
    	$arUsers=User::all();
    	 $title="Danh sách người dùng - AdminCP";  
    	return view('admin.users.index',['arUsers'=>$arUsers,'title'=>$title]);
    }
    public function create(){
    	$title="Thêm người dùng - AdminCP"; 
    	return view('admin.users.create',['title'=>$title]);	
    }

     public function store(UsersRequest $request){
     	$a=User::all();
     	foreach ($a as $key => $value) {
     		if($value->username==$request->username){
     			$message='Tên user tồn tại!';
     			$title="Thêm người dùng - AdminCP"; 
     			return view('admin.users.create',['title'=>$title,'message'=>$message]);
     		}
     	}
		$arUser = array(
			'username' => trim($request->username),
			'password' => bcrypt(trim($request->password)),
			'fullname' => $request->fullname,
			'active'=>1,
			'remember_token'=>''

			 ); 
		if(User::insert($arUser)){
			$request->session()->flash('msg','Thêm thành công!');
			return redirect()->route('admin.users.index');
		}else{
			$request->session()->flash('msg','Có lỗi khi thêm');
			return redirect()->route('admin.users.index');
		}	
    }

     public function edit($id){
     	$title="Sửa người dùng - AdminCP";
     	$arUser=User::find($id);
		return view('admin.users.edit',['arUser'=>$arUser,'title'=>$title]);
    }

       public function update($id,UserEditRequest $request){
      		$arItem=User::find($id);
      		if($arItem->username!=Auth::user()->username&&Auth::user()->username!='admin'){
      			$request->session()->flash('msg','Bạn không có quyền sửa thông tin của người dùng khác!');
				return redirect()->route('admin.users.index');
      		}
			$password=trim($request->password);
			
			
			if($password==''){
				$arItem->fullname =trim($request->fullname) ;
			}else{
				$arItem->password =bcrypt($request->password) ;
				$arItem->fullname =trim($request->fullname) ;
			}
			if($arItem->update()){
			$request->session()->flash('msg','Sửa thành công!');
			return redirect()->route('admin.users.index');
		}else{
			$request->session()->flash('msg','Có lỗi khi sửa');
			return redirect()->route('admin.users.index');
		}	
		
    }

       public function destroy($id,Request $request){
       	$arUser=User::find($id);
       	if(Auth::user()->username!='admin'){
       		$request->session()->flash('msg','Bạn không có quyền xóa người dùng khác!');
			return redirect()->route('admin.users.index');
       	}
     	if($arUser->delete()){
			$request->session()->flash('msg','Xóa thành công!');
			return redirect()->route('admin.users.index');
		}else{
			$request->session()->flash('msg','Có lỗi khi xóa');
			return redirect()->route('admin.users.index');
		}	
		
    }



}
