@extends('templates.admin.master')
@section('main-content')
    <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12 col-md-12">
                        <div class="card">
                            <div class="header">
                                <h4 class="title">Sửa danh mục tin</h4>
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
                                <form action="{{route('admin.cat.edit',['id'=>$arCat->cid])}}" method="post">
                                {{csrf_field()}}
                                    <div class="row">
                                        
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Tên danh mục</label>
                                                <input type="text" name="name" class="form-control border-input" placeholder="" value="{{$arCat->name}}">
                                            </div>
                                        </div>
                                    
                                    
                                    <div class="text-center">
                                        <input type="submit" class="btn btn-info btn-fill btn-wd" value="Sửa" />
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
