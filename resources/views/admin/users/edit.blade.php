@extends('templates.admin.master')
@section('main-content')
    <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12 col-md-12">
                        <div class="card">
                            <div class="header">
                                <h4 class="title">Thêm người dùng</h4>
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
                        
                                <form action="{{route('admin.users.update',['id'=>$arUser->id])}}" method="post">
                                {{csrf_field()}}
                                    <div class="row">
                                        
                                       
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Username</label>
                                                <input type="text" name="username" class="form-control border-input" placeholder="" readonly="" value="{{$arUser->username}}">
                                            </div>

                                        </div>

                                  
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Password</label>
                                                <input type="password" name="password" class="form-control border-input" placeholder="" value="">
                                            </div>

                                        </div>

                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Fullname</label>
                                                <input type="text" name="fullname" class="form-control border-input" placeholder="" value="{{$arUser->fullname}}">
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
