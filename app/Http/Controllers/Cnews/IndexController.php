<?php

namespace App\Http\Controllers\Cnews;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\News;
use App\Http\Requests\CatRequest;

class IndexController extends Controller
{
    public function index(){
    	 $CountFile = "resources/views/cnews/index/index.log";
          $CF = fopen ($CountFile, "r");
          $Views = fread ($CF, filesize ($CountFile));
          fclose ($CF);
          $Views++; 

          $CF = fopen ($CountFile, "w");
          fwrite ($CF, $Views); 
          fclose ($CF); 
          
    	$title="Trang chủ";
    	$arNews=News::orderBy('nid','DESC')->paginate(7);
    	return view('cnews.index.index',['arNews'=>$arNews,'title'=>$title,'Views'=>$Views]);
    }
}
