<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <link rel="apple-touch-icon" sizes="76x76" href="{{$adminUrl}}/assets/img/apple-icon.png">
    <link rel="icon" type="image/png" sizes="96x96" href="{{$adminUrl}}/assets/img/favicon.png">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

    <title>{{$title}}</title>

    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />

   {{--  <script type="text/javascript" src="{{$adminUrl}}/assets/js/jquery-2.1.1.min.js"></script> --}}
    <!-- Bootstrap core CSS     -->
    <link href="{{$adminUrl}}/assets/css/bootstrap.min.css" rel="stylesheet" />

    <!-- Animation library for notifications   -->
    <link href="{{$adminUrl}}/assets/css/animate.min.css" rel="stylesheet"/>
    <link href="{{$adminUrl}}/assets/css/img.css" rel="stylesheet"/>
     <script src="{{$adminUrl}}/assets/js/ckeditor/ckeditor.js" type="text/javascript"></script>
     <script src="{{$adminUrl}}/assets/js/ckfinder/ckfinder.js" type="text/javascript"></script>
     
    <!--  Paper Dashboard core CSS    -->
    <link href="{{$adminUrl}}/assets/css/paper-dashboard.css" rel="stylesheet"/>


    <!--  CSS for Demo Purpose, don't include it in your project     -->
    <link href="{{$adminUrl}}/assets/css/demo.css" rel="stylesheet" />


    <!--  Fonts and icons     -->
    <link href="http://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" rel="stylesheet">
    <link href='https://fonts.googleapis.com/css?family=Muli:400,300' rel='stylesheet' type='text/css'>
    <link href="{{$adminUrl}}/assets/css/themify-icons.css" rel="stylesheet">

</head>
<body>

<div class="wrapper">
  @include('templates.admin.left_bar')

    <div class="main-panel">
        
    @include('templates.admin.header')
    
    @yield('main-content')    

     @include('templates.admin.footer')


    </div>
</div>


</body>
    <script type="text/javascript" src="{{$adminUrl}}/assets/js/jquery-1.5.2.min.js"></script>
        <script type="text/javascript">
    $(document).ready(function() {
        // Sự kiện khi ô checkAll được check
        $("input[name='checkAll']").click(function() {
        
            // Thêm thuộc tính checked cho ô checkAll
            var checked = $(this).attr("checked");
            
            // Thêm thuộc tính checked cho ô checkbox khác
            $("#myTable tr td input:checkbox").attr("checked", checked);
        });
    });

    </script>

    <script type="text/javascript">
        function Check(chk)
        {
          if(document.fcheck.checkAll.checked==true){
             for (i = 0; i < chk.length; i++)
            chk[i].checked = true ;
             }else{
              for (i = 0; i < chk.length; i++)
            chk[i].checked = false ;
            }
             }
        </script>
    <!--   Core JS Files   -->
    <script src="{{$adminUrl}}/assets/js/jquery-1.10.2.js" type="text/javascript"></script>
    <script src="{{$adminUrl}}/assets/js/bootstrap.min.js" type="text/javascript"></script>

    <!-- Paper Dashboard Core javascript and methods for Demo purpose -->
    <script src="{{$adminUrl}}/assets/js/paper-dashboard.js"></script>

    <!-- Paper Dashboard DEMO methods, don't include it in your project! -->
    <script src="{{$adminUrl}}/assets/js/demo.js"></script>


</html>
