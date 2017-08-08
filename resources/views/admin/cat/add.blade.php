@extends('templates.admin.master')
@section('main-content')
    <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12 col-md-12">
                        <div class="card">
                            <div class="header">
                                <h4 class="title">Thêm danh mục tin</h4>
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
                                <form action="{{route('admin.cat.add')}}" method="post" enctype="multipart/form-data">
                                {{csrf_field()}}
                                    <div class="row">
                                        
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Tên danh mục</label>
                                                <input type="text" name="name" class="form-control border-input" placeholder="" value="">
                                            </div>
                                        </div>
                                    
                                    
                                    <div class="text-center">
                                    </br>
                                     </br>
                                      </br>
                                        <input type="submit" class="btn btn-info btn-fill btn-wd" value="Thêm" />
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
