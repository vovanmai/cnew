@extends('templates.cnews.master')
@section('main-content')
 <div class="left">
        <h2>Đăng tin</h2>
         @if (count($errors) > 0)
              <div class="alert alert-danger">
                  <ul>
                      @foreach ($errors->all() as $error)
                          <li>{{ $error }}</li>
                      @endforeach
                  </ul>
              </div>
          @endif
        <form action="{{route('cnews.news.store')}}" method="post" id="contactform" enctype="multipart/form-data">
        {{csrf_field()}}
          <ol>
            <label for="name"><strong style="color:blue">Tên tin*:</strong></label>
            <li>
                <input id="name" name="name" class="text" />
            </li>

            <label for="name"><strong style="color:blue">Danh mục*:</strong></label>
            <li>
              <input id="danh muc" name="cid" class="text" />
            </li>
            </br></br></br></br>
              <div class="form-group">
                  <label><strong style="color:blue">Hình ảnh:</strong></label>
                  <input type="file" name="picture" class="form-control" placeholder="Chọn ảnh" />
              </div>
            </br>
            
            <label for="preview_text"><strong style="color:blue">Mô tả*:</strong></label>
            <li>
              
              <textarea id="preview_text" name="preview_text" rows="6" cols="50"></textarea>
            </li>
            </br></br></br></br></br></br>
            <label for="detail_text"><strong style="color:blue">Chi tiết*:</strong></label>
            <li>
              <textarea id="detail_text"  name="detail_text" rows="10" cols="50"></textarea>
                <script type="text/javascript">
                                CKEDITOR.replace( 'detail_text', {
                                language:'vi',
                                filebrowserBrowseUrl: '{{$adminUrl}}/assets/js/ckfinder/ckfinder.html',
                                filebrowserImageBrowseUrl: '{{$adminUrl}}/assets/js/ckfinder/ckfinder.html?type=Images',
                                filebrowserFlashBrowseUrl: '{{$adminUrl}}/assets/js/ckfinder/ckfinder.html?type=Flash',
                                filebrowserUploadUrl: '{{$adminUrl}}/assets/js/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files',
                                filebrowserImageUploadUrl: '{{$adminUrl}}/assets/js/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images',
                                filebrowserFlashUploadUrl: '{{$adminUrl}}/assets/js/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash'
                              } );
                            </script>  
            </li>
            
            <li class="buttons">
              <input type="submit" name="imageField" id="imageField"  value="Đăng tin" class="send" />
              <div class="clr"></div>
            </li>
          </ol>
        </form>
      </div>
 @stop     