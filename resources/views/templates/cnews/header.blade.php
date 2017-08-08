 <div>
    @if(isset($Views))
            <span class="truycap">Số lượt truy cập:
             {{$Views}}
            </span>
          @endif 
 <div>
 <div class="header">
    
    <div class="header_resize">
      <div class="logo">
        <h1><a href="index.html"><span></span><br />
          <small></small></a></h1>
      </div>
     
      <div class="clr"></div>
      <div class="menu">
        <ul>
          <li><a href="{{route('cnews.index.index')}}" class="<?php if(Request::is('/')){echo "active";}?>"><span>Trang chủ</span></a></li>
          <li><a href="{{route('cnews.index.create')}} " class="<?php if(Request::is('add')){echo "active";}?>"><span>Đăng tin</span></a></li>
          <li><a href="{{route('auth.auth.login')}}"><span>Đăng nhập</span></a></li>
        </ul>
      </div>
      <div class="clr"></div>
    </div>
  </div>