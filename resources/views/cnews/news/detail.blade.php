 @extends('templates.cnews.master')
 @section('main-content') 
   <div class="left">

        <h1>{{$arNew->name}}</h1>
        <div class="ngaydangdang" >
            <p >Ngày đăng: {{$arNew->created_at}}</p>
            <p >Số lượt xem :{{$arNew->view_count}} </p>
            </div>

        <div class="item-detail">
	        <p><?php echo $arNew->detail_text ?></p>

		</div>
      </div>
@stop