@extends('templates.admin.master')
@section('main-content')
   <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="header">
                                <h4 class="title">Danh sách người dùng</h4>
                                @if(Session::has('msg'))
                                 <p class="category success">{{Session::get('msg')}}</p>
                                @endif
                                <form action="" method="post">
                                    <div class="row">
                                        <div class="col-md-1">
                                            <div class="form-group">
                                                <input type="text" name="id" class="form-control border-input" value=""  placeholder="ID">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <input type="text" name="fullname" class="form-control border-input" placeholder="Họ tên" value="">
                                            </div>
                                        </div>
                                  
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <input type="submit" name="search" value="Tìm kiếm" class="is" />
                                                <input type="submit" name="reset" value="Hủy tìm kiếm" class="is" />
                                            </div>
                                        </div>
                                    </div>
                                    
                                </form>
                                
                                <a href="{{route('admin.users.create')}}" class="addtop"><img src="{{$adminUrl}}/assets/img/add.png" alt="" /> Thêm</a>
                            </div>
                            <div class="content table-responsive table-full-width">
                                <table class="table table-striped">
                                    <thead>
                                        <th>ID</th>
                                        <th>Username</th>
                                        <th>Fullname</th>
                                        <th>Chức năng</th>
                                    </thead>
                                    <tbody>
                                    @foreach($arUsers as $arItem)
                                        <?php
                                            $id=$arItem->id;
                                            $username=$arItem->username;
                                            $fullname=$arItem->fullname;
                                            $urlEdit=route('admin.users.edit',['id'=>$id]);
                                             $urlDel=route('admin.users.destroy',['id'=>$id]);

                                        ?>
                                        <tr>
                                            @if(Auth::user()->id==$id)
                                                <td><a>{{$id}}</a></td>
                                                <td><a>{{$username}}</a></td>
                                                <td><a>{{$fullname}}</a></td>
                                            @else
                                                <td>{{$id}}</td>
                                                <td>{{$username}}</td>
                                                <td>{{$fullname}}</td>
                                            @endif
                                            <td>

                                                <a href="{{$urlEdit}}"><img src="{{$adminUrl}}/assets/img/edit.gif" alt="" /> Sửa</a> &nbsp;
                                                    <?php
                                                    if($arItem->username!='admin'){
                                                    ?>
                                                ||&nbsp;
                                                <a href="{{ $urlDel}}"><img src="{{$adminUrl}}/assets/img/del.gif" alt="" /> Xóa</a>
                                                <?php } ?>
                                            </td>
                                        </tr>
                                  
                                     @endforeach  
                                   
                                    </tbody>
 
                                </table>

                                <div class="text-center">
                                       
                                </div>
                            </div>
                        </div>
                    </div>


                </div>
            </div>
        </div>
@stop