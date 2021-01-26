<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
  <!-- Brand Logo -->
  <a href="index3.html" class="brand-link">
    <img src="{{asset("assets/admin/dist/img/AdminLTELogo.png")}}" alt="AdminLTE Logo"
      class="brand-image img-circle elevation-3" style="opacity: .8">
    <span class="brand-text font-weight-light">{{ env("APP_NAME") }}</span>
  </a>

  <!-- Sidebar -->
  <div class="sidebar">
    <!-- Sidebar user panel (optional) -->
    <div class="user-panel mt-3 pb-3 mb-3 d-flex justify-content-center">
      <div class="info">
        <a href="#" class="d-block">{{ Auth::User()->name }}</a>
      </div>
      <div class="image px-0 ml-3 mr-1">
        <img src="{{asset("assets/admin/dist/img/user2-160x160.jpg")}}" class="img-circle elevation-2" alt="User Image">
      </div>

    </div>

    <!-- SidebarSearch Form -->
    {{-- <div class="form-inline">
      <div class="input-group" data-widget="sidebar-search">
        <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
        <div class="input-group-append">
          <button class="btn btn-sidebar">
            <i class="fas fa-search fa-fw"></i>
          </button>
        </div>
      </div>
    </div> --}}

    <!-- Sidebar Menu -->
    <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column pr-0" data-widget="treeview" role="menu" data-accordion="false">
        <!-- Add icons to the links using the .nav-icon class
             with font-awesome or any other icon font library -->

        <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->

        {{-- <li class="nav-header text-right">عملیات</li> --}}

        <li class="nav-item w-100 text-right">
          <a href="{{ route("admin.users.index") }}" class="nav-link">
            <i class="nav-icon fas fa-user"></i>
            <p>
              کاربران
            </p>
          </a>
        </li>
        <li class="nav-item w-100 text-right">
          <a href="{{ route("admin.jobs.index") }}" class="nav-link">
            <i class="nav-icon fa fa-address-card"></i>
            <p>
              مشاغل
            </p>
          </a>
        </li>


        <li class="nav-item w-100 text-right">
          <a href="{{ route("admin.plans.index") }}" class="nav-link">
            <i class="nav-icon fa fa-calendar"></i>
            <p>
              پلن ها
            </p>
          </a>
        </li>

        <li class="nav-item w-100 text-right">
          <a href="{{ route("admin.jobgroups.index") }}" class="nav-link">
            <i class="nav-icon fa fa-sitemap"></i>
            <p>
              گروه های شغلی
            </p>
          </a>
        </li>
        <li class="nav-item w-100 text-right">
          <a href="{{ route("admin.jobcategories.index") }}" class="nav-link">
            <i class="nav-icon fa fa-street-view"></i>
            <p>

              دسته های شغلی
            </p>
          </a>
        </li>
        <li class="nav-item w-100 text-right">
          <a href="{{ route("admin.ratingquestions.index") }}" class="nav-link">
            <i class="nav-icon fa fa-question-circle"></i>
            <p>
              سوالات نطرسنجی
            </p>
          </a>
        </li>

        <li class="nav-item w-100 text-right">
          <a href="{{ route("admin.advertisements.index") }}" class="nav-link">
            <i class="nav-icon fa fa-shopping-bag"></i>
            <p>
              آگهی ها
            </p>
          </a>
        </li>

        <li class="nav-item w-100 text-right">
          <a href="{{ route("admin.peyments.index") }}" class="nav-link">
            <i class="nav-icon fa fa-credit-card"></i>
            <p>
              پرداختی ها
            </p>
          </a>
        </li>
        <li class="nav-item w-100 text-right">
          <a href="{{ route("admin.reports.index") }}" class="nav-link">
            <i class="nav-icon fa fa-exclamation-triangle"></i>
            <p>
              گزارشات
            </p>
          </a>
        </li>
        <li class="nav-item w-100 text-right">
          <a href="{{ route("admin.comments.index") }}" class="nav-link">
            <i class="nav-icon fa fa fa-comments	
            "></i>
            <p>
              کامتها
            </p>
          </a>
        </li>
        <hr />

        <li class="nav-item w-100 text-right">
          <a href="{{ route("admin.tags.index") }}" class="nav-link">
            <i class="nav-icon fa fa-tags"></i>
            <p>
              تگ ها
            </p>
          </a>
        </li>

        <li class="nav-item w-100 text-right">
          <a href="{{ route("admin.categories.index") }}" class="nav-link">
            <i class="nav-icon fa fa-sitemap"></i>
            <p>
              دسته بندی ها
            </p>
          </a>
        </li>
        <li class="nav-item w-100 text-right">
          <a href="{{ route("admin.posts.index") }}" class="nav-link">
            <i class="nav-icon fa fa-book"></i>
            <p>
              پست ها
            </p>
          </a>
        </li>
        <hr />
        <li class="nav-item w-100 text-right">
          <a href="#" class="nav-link">
            <i class="nav-icon fa fa-cog"></i>
            <p>
              تنظیمات
              <i class="fas fa-angle-left right"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            {{-- <li class="nav-item w-100 text-right">
              <a href="{{ route('admin.profile') }}" class="nav-link">
            <i class="fas fa-user nav-icon"></i>
            <p>پروفایل</p>
            </a>
        </li> --}}
        <li class="nav-item w-100 text-right">
          <a href="{{ route('admin.settings') }}" class="nav-link">
            <i class="fa fa-cogs nav-icon"></i>
            <p>تنظیمات</p>
          </a>
        </li>
        <li class="nav-item w-100 text-right">
          <a href="{{ route('admin.changepassword') }}" class="nav-link">
            <i class="fa fa-unlock-alt nav-icon"></i>
            <p>تغییر رمز ورود</p>
          </a>
        </li>

      </ul>
      </li>
      <li class="mx-auto w-100">
        {{Form::open(['route' => 'logout' , 'method' => 'POST', "class" => "w-100"   ])}}
        <input type="submit" class="btn btn-danger btn-block" value="خروج">
        {{Form::close()}}
      </li>
      </ul>
    </nav>
    <!-- /.sidebar-menu -->
  </div>
  <!-- /.sidebar -->
</aside>