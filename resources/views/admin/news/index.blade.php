@extends('templates.admin.master')
@section('main-content')
   <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="header">
                                <h4 class="title">Danh sách tin tin tức</h4>
                                @if(Session::has('msg'))
                                 <p class="category success">{{Session::get('msg')}}</p>
                                @endif
                               {{--  <form action="" method="post">
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
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <select name="friend_list" class="form-control border-input">
                                                    <option value="0">-- Chọn danh mục --</option>
                                                    <option value="1">Bạn quen thời phổ thông</option>
                                                    <option>Bạn quen thời đại học</option>
                                                    <option>Bạn tâm giao</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <input type="submit" name="search" value="Tìm kiếm" class="is" />
                                                <input type="submit" name="reset" value="Hủy tìm kiếm" class="is" />
                                            </div>
                                        </div>
                                    </div>
                                    
                                </form> --}}
                                
                                <a href="{{route('admin.news.store')}}" class="addtop"><img src="{{$adminUrl}}/assets/img/add.png" alt="" /> Thêm</a>
                            </div>
                            <div class="content table-responsive table-full-width">
                             <form name="fcheck" id="fcheck" method="POSt">
                              {{csrf_field()}}
                                <table class="table table-striped">
                                    <thead>
                                    <th> <input type="checkbox" id="checkAll" name="checkAll" onclick="Check(document.fcheck.chk)"/> Chọn tất cả</th>
                                        <th>ID</th>
                                        <th>Tên tin</th>
                                        <th>Hình ảnh</th>
                                         <th>Thuộc danh mục</th>
                                        <th>Ngày đăng</th>
                                        <th>Ngày sửa</th>
                                        <th>Hiển thị</th>
                                        <th>Chức năng</th>
                                    </thead>
                                    <tbody>
                                  
                                    @foreach($arItems as $arItem)


                                    <?php
                                    
                                      
                                        $id=$arItem->nid;
                                        $name=$arItem->name;
                                        $created_at=$arItem->created_at;
                                        $picture=$arItem->picture;
                                        $cname=$arItem->cname;
                                        $updated_at=$arItem->updated_at;
                                        $urlPic='/storage/app/files/'.$picture;
                                        $display=$arItem->display;
                                        $delUrl=route('admin.news.destroy',['id'=>$id]);
                                        $editUrl=route('admin.news.edit',['id'=>$id]);
                                        $name_slug=str_slug($name);
                                        $url=route('cnews.news.detail',['slug'=>$name_slug,'id'=>$id]);
                                    ?>

                                        <tr>
                                             <td>
                                            <input type="checkbox" name="chk[]" id="chk" value="{{$id}}"/>
                                             </td>
                                            <td>{{$id}} </td>
                                            <td><a href="{{$url}}">{{$name}}</a></td>
                                            <td>
                                            @if($picture=='')
                                                <strong>Không có hình</strong>
                                             @else   
                                                <img src="{{$urlPic}}" alt="" width="100px" />
                                            @endif
                                            </td>
                                            <td>{{$cname}}</td>
                                            <td>{{$created_at}}</td>
                                            <td>{{$updated_at}}</td>
                                            <td> &nbsp; &nbsp;&nbsp; {{$display}}</td>
                                            <td>
                                                <a href="{{ $editUrl}}"><img src="{{$adminUrl}}/assets/img/edit.gif" alt="" /> Sửa</a> &nbsp;||&nbsp;
                                                <a href="{{$delUrl}}" onclick="return confirm('Bạn có chắn chắn xóa không ?');"><img src="{{$adminUrl}}/assets/img/del.gif" alt="" /> Xóa</a>
                                            </td>
                                        </tr>
                                    @endforeach   
                                        
                                    </tbody>
 
                                </table>
                                 @if(Session::has('chon'))
                                    </br>
                                    <strong style='color:red'>{{Session::get('chon')}}</strong>
                                
                                @endif
                                <br/>
                                <input type="submit" onclick="return confirm('Bạn có chắn chắn xóa không ?');" name="submit" value="Xóa mục đã chọn"  />

                                 
                                </form>
                   

                                <div class="text-center">
                                        {{$arItems->links()}}
                                </div>
                            </div>
                        </div>
                    </div>


                </div>
            </div>
        </div>
@stop