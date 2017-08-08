<?php

namespace App\Http\Controllers\Cnews;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\News;
use App\Model\Category;
use App\Http\Requests\CatRequest;
use App\Http\Requests\NewsRequest;
use App\Http\Requests\NewsRequestPublic;
use Illuminate\Support\Facades\Storage;



class NewsController extends Controller
{
    public function cat($slug,$id){

        $arCat=Category::find($id);
        $arNews=News::where('cid','=',$id)->orderBy('nid','DESC')->paginate(5);
        if(count($arNews) == 0){
            return redirect()->route('cnews.index.index');
        }
        $title=$arCat->name;
    	return view('cnews.news.cat',['arNews'=>$arNews,'arCat'=>$arCat,'title'=>$title]);
    }
    public function detail($slug,$id){

        $arNew=News::find($id);
        if($arNew==null){
            return redirect()->route('cnews.index.index');
        }
        $tmp=$arNew->view_count;
        $arNew->view_count=$tmp+1;
        $arNew->update();
        if($arNew == null){
            return redirect()->route('cnews.index.index');
        }
        $title='';
    	return view('cnews.news.detail',['arNew'=>$arNew,'title'=>$title]);

    }
    //thêm mới
    //getadd thành create
    //post =>store
    //Sửa
    //Get edit
    //POST update
    //xóa 
    //GET :destroy


    public function create(){
        $title="Thêm tin tức";
    	return view('cnews.news.add',['title'=>$title]);

    }
    public function store(NewsRequestPublic $request){

        

         $arHaveCat=Category::where('name','like',$request->cid)->get();
         $a=$arHaveCat->first();

        if($a==null){
           $arCat = array('name' => $request->cid );
            Category::insert($arCat);
            $arCat_End=Category::orderBy('cid','DESC')->first();
            $b=$arCat_End->cid;

        }else{
            $b=$a->cid;

        }

         $arItem = array(
            'name' =>$request->name ,
            'preview_text' =>$request->preview_text,
            'detail_text' =>$request->detail_text,
            'cid' =>$b,
            'count_number' =>100,
            'display' =>0,
            'view_count' =>0,
            
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
            $request->session()->flash('msg','Thêm thành công, tin của bạn sẽ được duyệt mới được đăng lên!');
            return redirect()->route('cnews.index.index');

        }else{
             $request->session()->flash('msg','Thêm thất bại');
            return redirect()->route('cnews.index.index');
        }

    }
}
