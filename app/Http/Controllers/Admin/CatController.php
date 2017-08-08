<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Category;
use App\Model\News;
use App\Http\Requests\CatRequest;
use App\Http\Requests\CatRequest1;
use Illuminate\Support\Facades\Storage;



class CatController extends Controller
{
    public function index(){ 
        $title="Danh mục tin - AdminCP";   
    	$arCats=Category::paginate(10);
    	return view('admin.cat.index',['arCats'=>$arCats,'title'=>$title]);
    }
    public function create(){
        $title="Thêm mục tin - AdminCP";  
    	return view('admin.cat.add',['title'=>$title]);
    }
    public function store(CatRequest $request){
        $danhmuc=$request->name;
        $arallCat=Category::where('name','LIKE',$danhmuc)->get();
        $a=$arallCat->first();
        if($a!=null){
            $request->session()->flash('msg','Tên danh mục đã tồn tại!');
            return redirect()->route('admin.cat.index');
        }
    	$arCat = array('name' => $request->name );
    	if(Category::insert($arCat)){
    		$request->session()->flash('msg','Thêm thành công');
    		return redirect()->route('admin.cat.index');
    	}else{
    		$request->session()->flash('msg','Có lỗi khi thêm');
    		return redirect()->route('admin.cat.index');
    	}
    	
    }

    public function edit($id){
    	$arCat=Category::find($id);
        if($arCat==null){
            return redirect()->route('admin.cat.index');
        }
        $title="Sửa mục tin - AdminCP";  
    	return view('admin.cat.edit',['arCat'=>$arCat,'title'=>$title]);
    }
    public function update($id,CatRequest $request){
    	$arCat=Category::find($id);
        if($arCat==null){
            return redirect()->route('admin.cat.index');

        }
    	$arCat->name=$request->name;
    	if($arCat->update()){
    		$request->session()->flash('msg','Sửa thành công');
    		return redirect()->route('admin.cat.index');	
    	}else{
    		$request->session()->flash('msg','Sửa thất bại');
    		return redirect()->route('admin.cat.index');
    	}
    }

    public function destroy($id,Request $request){
        $arCat=Category::find($id);
        $arNews=News::where('cid','=',$id)->get();


        foreach($arNews as $arNew){
            $picture=$arNew->picture;
        
            if($picture!=''){
                Storage::delete('files/'.$picture);
            }
            $arNew->delete();
        }
    	if($arCat->delete()){
    		$request->session()->flash('msg','Xóa thành công');
    		return redirect()->route('admin.cat.index');
    	}else{
    		$request->session()->flash('msg','Xóa thất bại');
    		return redirect()->route('admin.cat.index');
    	}
    }
    
    public function postDel(Request $request){
        $arCheckbox =$request->chk;
        if($arCheckbox==null){
            $request->session()->flash('chon','Vui lòng chọn mục muốn xóa!');
            return redirect()->route('admin.cat.index');
        }else{
        foreach ($arCheckbox as $key => $value) {
            $arCat=Category::find($value);
            $arCat->delete();
            $arNews=News::where('cid','=',$value)->get();
            foreach($arNews as $arNew){
                $picture=$arNew->picture;
            
                if($picture!=''){
                    Storage::delete('files/'.$picture);
                }
                $arNew->delete();
        }
            
        }
        $string='Xóa thành công '.count($arCheckbox).' danh mục';
        $request->session()->flash('msg',$string);
        return redirect()->route('admin.cat.index');
    }
    }
}
