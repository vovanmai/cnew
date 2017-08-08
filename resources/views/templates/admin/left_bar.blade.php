 
  <div class="sidebar" data-background-color="white" data-active-color="danger">
        <div class="sidebar-wrapper">
            <div class="logo">
                <a href="http://vinaenter.edu.vn" class="simple-text">AdminCP</a>
            </div>

            <ul class="nav">
            
                <li class="
                     <?php if(Request::is('admin/cat*')){echo 'active'; }?>
                ">
                    <a  href="{{route('admin.cat.index')}}">
                        <i class="ti-map"></i>
                        <p>Danh mục</p>
                    </a>
                </li>
                 <li class="
                   <?php if(Request::is('admin/news*')){echo 'active'; }?>
                 ">
                    <a href="{{route('admin.news.index')}}">
                        <i class="ti-view-list-alt"></i>
                        <p>Tin tức</p>
                    </a>
                </li>
              
                 <li class="
                   <?php if(Request::is('admin/users*')){echo 'active'; }?>
                 ">
                    <a href="{{route('admin.users.index')}}">
                        <i class="ti-user"></i>
                        <p>Danh sách người dùng</p>
                    </a>
                </li>
            </ul>
        </div>
    </div>