@extends('templates.admin.master')
@section('main-content')
    <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12 col-md-12">
                        <div class="card">
                            <div class="header">
                                <h4 class="title">Thêm tin</h4>
                            </div>
                            <div class="content">
                             @if (count($errors) > 0)
                              <div class="alert alert-danger">
                                  <ul>
                                      @foreach ($errors->all() as $error)
                                          <li>{{ $error }}</li>
                                      @endforeach
                                  </ul>
                              </div>
                          @endif
                                <form action="{{route('admin.news.store')}}" method="post" enctype="multipart/form-data">
                                {{csrf_field()}}
                                    <div class="row">
                                      
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Tên tin</label>
                                                <input type="text" name="name" class="form-control border-input" placeholder="Tên tin" value="">
                                            </div>
                                        </div>
                                   
                                       
                                    </div>

                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Danh mục tin</label>
                                                <select name="cid" class="form-control border-input">
                                                    @foreach($arCats as $arCat)
                                                        <option value="{{$arCat->cid}}">{{$arCat->name}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Hình ảnh</label>
                                                <input type="file" name="picture" class="form-control" placeholder="Chọn ảnh" />
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Mô tả</label>
                                                <textarea rows="4" name='preview_text' class="form-control border-input" placeholder="Mô tả tóm tắt "></textarea>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Chi tiết</label>
                                                <textarea  rows="6" id="editor1" name='detail_text' class="form-control border-input" placeholder=""></textarea>
                            <script type="text/javascript">
                                CKEDITOR.replace( 'editor1', {
                                language:'vi',
                                filebrowserBrowseUrl: '{{$adminUrl}}/assets/js/ckfinder/ckfinder.html',
                                filebrowserImageBrowseUrl: '{{$adminUrl}}/assets/js/ckfinder/ckfinder.html?type=Images',
                                filebrowserFlashBrowseUrl: '{{$adminUrl}}/assets/js/ckfinder/ckfinder.html?type=Flash',
                                filebrowserUploadUrl: '{{$adminUrl}}/assets/js/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files',
                                filebrowserImageUploadUrl: '{{$adminUrl}}/assets/js/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images',
                                filebrowserFlashUploadUrl: '{{$adminUrl}}/assets/js/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash'
} );
                            </script>                    
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="text-center">
                                        <input type="submit" class="btn btn-info btn-fill btn-wd" value="Thực hiện" />
                                    </div>
                                    <div class="clearfix"></div>
                                </form>
                            </div>
                        </div>
                    </div>


                </div>
            </div>
        </div>
@stop
