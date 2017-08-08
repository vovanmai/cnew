<nav class="navbar navbar-default">
            <div class="container-fluid">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar bar1"></span>
                        <span class="icon-bar bar2"></span>
                        <span class="icon-bar bar3"></span>
                    </button>
                    <a class="navbar-brand" href="/admin" style="color:blue">Trang quản lý</a>
                </div>
                <div class="collapse navbar-collapse">
                    <ul class="nav navbar-nav navbar-right">
                        <li>
                        @if(Auth::user()!=null)
                            <div class="user_current" >
                                <span><strong>Chào,{{Auth::user()->fullname}}</strong></span>
                            </div>
                        @endif
                            @if(Request::is('admin*'))
                            <a href="{{route('auth.auth.logout')}}">
                                <i class="ti-settings"></i> 
                                <p>Logout</p>
                            </a>
                            @endif


                        </li>
                    </ul>

                </div>
            </div>
        </nav>