 @extends('templates.cnews.master')
 @section('main-content')
 <div class="left">
        <h1>{{$arCat->name}}</h1>
        @foreach($arNews as $arItem)
        <?php 
        	$nid=$arItem->nid;
        	$name=$arItem->name;
        	$name_slug=str_slug($name);
            $picture=$arItem->picture;
            $created_at=$arItem->created_at;
            $display=$arItem->display;
        	$url=route('cnews.news.detail',['slug'=>$name_slug,'id'=>$nid]);
        ?>
        @if($display==1)
        <div class="item">
        	<h2><a href="{{$url}}" title="">{{$name}}</a></h2>
            <div class="ngaydang" >
            <p >Ngày đăng: {{$created_at}}</p>
            </div>
            @if($picture!='')
	        <img src="{{$URL_PIC}}/{{$arItem->picture}}" alt="" width="585" height="156" />
            @endif
	        <div class="clr"></div>
	        <p>{{$arItem->preview_text}}</p>
		</div>
		@endif
		@endforeach

        <div class="phantrang">
            {{$arNews->links()}}
         </div> 
		
      </div>
@stop