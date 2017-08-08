<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>@if($title !=''){{$title}} @endif</title>
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<link href="{{$publicUrl}}/style.css" rel="stylesheet" type="text/css" />
<link href="{{$publicUrl}}/style.css" rel="stylesheet" type="text/css" />
<link href="{{$publicUrl}}/phantrang.css" rel="stylesheet" type="text/css" />

<link href="{{$publicUrl}}/bootstrap.min.css" rel="stylesheet" />
<script type="text/javascript" src="{{$publicUrl}}/js/cufon-yui.js"></script>
<script type="text/javascript" src="{{$publicUrl}}/js/arial.js"></script>
<script type="text/javascript" src="{{$publicUrl}}/js/cuf_run.js"></script>
<script src="{{$adminUrl}}/assets/js/ckeditor/ckeditor.js" type="text/javascript"></script>
     <script src="{{$adminUrl}}/assets/js/ckfinder/ckfinder.js" type="text/javascript"></script>
</head>
<body>
<div class="main">
 @include('templates.cnews.header')

  <div class="body">
    <div class="body_resize">
      @yield('main-content')
      
      @include('templates.cnews.right_bar')
      <div class="clr"></div>
    </div>
  </div>
      @include('templates.cnews.footer')
</div>
</body>
</html>
