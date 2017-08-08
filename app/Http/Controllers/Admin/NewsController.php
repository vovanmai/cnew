<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Category;
use Illuminate\Support\Facades\DB;
use App\Model\News;
use App\Http\Requests\NewsRequest;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;
class NewsController extends Controller
{

	public function index(Request $request){
        $title="Tin tức - AdminCP";  
        $arItems=News::getItems();      
    	return view('admin.news.index',['arItems'=>$arItems,'title'=>$title]);
       
    }
    //lấy trang thêm
    public function create(){
        $title="Thêm tin tức - AdminCP";  
        $arCats=Category::all();
    	return view('admin.news.create',['arCats'=>$arCats,'title'=>$title]);
    }
    //thêm danh mục
    public function store(NewsRequest $request){
        $arItem = array(
            'name' =>$request->name ,
            'preview_text' =>$request->preview_text,
            'detail_text' =>$request->detail_text,
            'cid' =>$request->cid,
            'count_number' =>100,
            'display'=>1,
            'view_count'=>0,
            
         );
    	$picture=$request->picture;
        if($picture!=''){
            $pathUpload=$request->file('picture')->store('files');
            $tmp=explode('/',$pathUpload);
            $picture=end($tmp);
            $arItem['picture']=$picture;
        }else{
            $arItem['picture']='';
        }
        if(News::insert($arItem)){
            $request->session()->flash('msg','Thêm thành công');
            return redirect()->route('admin.news.index');
        }else{
             $request->session()->flash('msg','Có lỗi khi thêm');
            return redirect()->route('admin.news.index');
        }
    }

    public function destroy($id,Request $request){
        if(Auth::user()->username!='admin'){
            $request->session()->flash('msg','Bạn không có quyền xóa!');
            return redirect()->route('admin.news.index');
        }
        $arItem=News::find($id);
        $oldPic=$arItem->picture;
        if($oldPic!=''){
            $urlPic='files/'.$oldPic;
            Storage::delete($urlPic);
        }
        if($arItem->delete()){
            $request->session()->flash('msg','Xóa thành công');
            return redirect()->route('admin.news.index');
        }else{
             $request->session()->flash('msg','Có lỗi khi xóa');
            return redirect()->route('admin.news.index');
        }

    }





     public function postDel(Request $request){
        $arCheckbox =$request->chk;
        if($arCheckbox==null){
            $request->session()->flash('chon','Vui lòng chọn tin muốn xóa!');
            return redirect()->route('admin.news.index');
        }else{
        foreach ($arCheckbox as $key => $value) {

            $arNew=News::find($value);
            $picture=$arNew->picture;
            if($picture!=''){
                    Storage::delete('files/'.$picture);
                }
                $arNew->delete();
        }
            
        }
        $string='Xóa thành công '.count($arCheckbox).' tin';
        $request->session()->flash('msg',$string);
        return redirect()->route('admin.news.index');
    }
    


    public function edit($id){
         $title="Sửa tin tức - AdminCP";  
        $arItem=News::find($id);
        if($arItem==null){
            return redirect()->route('admin.news.index');
        }
        $arCat=Category::all();
        return view('admin.news.edit',['arItem'=>$arItem,'arCat'=>$arCat,'title'=>$title]);
    }
     public function update($id,NewsRequest $request){
        $arItem=News::find($id);
        if($arItem==null){
            return redirect()->route('admin.news.index');
        }
        $picture=$request->picture;
        if($picture !=''){
            $pathUpload=$request->file('picture')->store('files');
            $tmp=explode('/',$pathUpload);
            $picture=end($tmp);
            $oldPic=$arItem->picture;
            if($oldPic!=''){
                Storage::delete('files/'.$oldPic);
             }
            $arItem->picture=$picture;

        }
        $arItem->name=$request->name;
        $arItem->preview_text=$request->preview_text;
        $arItem->detail_text=$request->detail_text;
        $arItem->display=$request->display;
        $arItem->cid=$request->cid;

         if($arItem->update()){
            $request->session()->flash('msg','Sửa thành công');
            return redirect()->route('admin.news.index');
        }else{
             $request->session()->flash('msg','Có lỗi khi sửa');
            return redirect()->route('admin.news.index');
        }
        
    }

    public function getAjax(){
        return view('admin.news.ajax');
    }

}
