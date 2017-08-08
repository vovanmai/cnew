@extends('templates.admin.master')
@section('main-content')
   <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="header">
                                <h4 class="title">Các loại danh mục</h4>
                                @if(Session::has('msg'))
                                <p class="category success">
                                    {{Session::get('msg')}}
                                 </p>
                                @endif
                                <form action="" method="post">
                                    <div class="row">
                                      
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <input type="text" name="fullname" class="form-control border-input" placeholder="Tên danh mục" value="">
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
                                
                                <a href="{{route('admin.cat.add')}}" class="addtop"><img src="{{$adminUrl}}/assets/img/add.png" alt="" /> Thêm</a>
                            </div>
                            <div class="content table-responsive table-full-width">
                            <form name="fcheck" id="fcheck" method="POSt">
                              {{csrf_field()}}
                                <table class="table table-striped" id="myTable">
                                    <thead>
                                        <th> <input type="checkbox" id="checkAll" name="checkAll" onclick="Check(document.fcheck.chk)"/> Chọn tất cả</th>
                                        <th>ID</th>
                                        <th>Danh mục tin</th>
                                       
                                        <th>Chức năng</th>
                                        
                                    </thead>
                                    <tbody>
                                    @foreach($arCats as $arItem)
                                    <?php
                                        $id=$arItem->cid;
                                        $urlEdit=route('admin.cat.edit',['cid'=>$id]);
                                        $urlDel=route('admin.cat.del',['cid'=>$id]);
                                     ?>   
                                        <tr>
                                             <td>
                                            <input type="checkbox" name="chk[]" id="chk" value="{{$id}}"/>
                                             </td>
                                            <td>{{$arItem->cid}}</td>
                                            <td>{{$arItem->name}}</td>
                                            
                                            <td>
                                                <a href="{{$urlEdit}}"><img src="{{$adminUrl}}/assets/img/edit.gif" alt="" /> Sửa</a> &nbsp;||&nbsp;
                                                <a href="{{$urlDel}}" onclick="return confirm('Bạn có chắn chắn xóa không ?');"><img src="{{$adminUrl}}/assets/img/del.gif" alt="" /> Xóa</a>
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
                                    <ul class="pagination">
                                        {{$arCats->links()}}
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>


                </div>
            </div>
        </div>
@stop