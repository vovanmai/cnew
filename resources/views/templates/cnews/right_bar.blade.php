<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Category;
use Illuminate\Support\Facades\DB;
use App\Model\News;
use App\Http\Requests\NewsRequest;
use Illuminate\Support\Facades\Storage;

?>
  <div class="right">
        <h2>Danh mục</h2>
        <ul>
        @foreach($arCats as $arItem)
        <?php
        	$cid=$arItem->cid;
        	$name=$arItem->name;
        	$name_slug=str_slug($name);
        	$url=route('cnews.news.cat',['slug'=>$name_slug,'id'=>$cid]);
          $arN=News::where('cid','=',$cid)->get();
          
         
         ?>
          <li class="class1" ><a href="{{$url}}" >{{$arItem->name}}</a></li>   
        @endforeach
        </ul>
      </div>