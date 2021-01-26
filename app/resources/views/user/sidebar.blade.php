@push('script')


<script>
  console.log("hello");

</script>


@endpush

<div class="sidebar" data-color="white" data-active-color="danger">
  <div class="logo">
    <a href="{{ route("user.dashboard") }}" class="simple-text logo-mini">
      <div class="logo-image-small">
        @if(Storage::disk('public')->exists('users/'. Auth::user()->image) &&
        Auth::user()->image)
        <img class="avatar border-gray" src="{{Storage::url('users/'.Auth::user()->image)}}"
          alt="{{Auth::user()->name}}">
        @else
        <img class="avatar border-gray" src="{{Storage::url('users/default.png')}}" alt="{{Auth::user()->name}}">
        @endif
      </div>
      <!-- <p>CT</p> -->
    </a>
    <a href="{{ route("user.dashboard") }}" class="simple-text logo-normal">

      @isset(Auth::user()->name)
      {{Auth::user()->name}}
      @else
      کاربر جدید
      @endisset
    </a>
  </div>
  <div class="sidebar-wrapper">
    <ul class="nav">
      <li class="active ">
        <a href="{{ route("user.dashboard") }}">
          <i class="nc-icon nc-bank"></i>
          <p>داشبورد</p>
        </a>
      </li>
      <li>
        <a href="{{ route("user.job.index") }}">
          <i class="nc-icon nc-refresh-69"></i>
          <p>تکمیل اطلاعات شغل</p>
        </a>
      </li>
      <li>
        <a href="{{ route("user.plans.index") }}">
          <i class="nc-icon nc-diamond "></i>
          <p>ثبت آگهی ویژه</p>
        </a>
      </li>
      <li>
        <a href="{{ route("user.peyments.index") }}">
          <i class="nc-icon nc-diamond"></i>
          <p>پرداختی ها</p>
        </a>
      </li>
      <li class="nav-item w-100 text-right">
        <a href="{{ route('user.profile') }}" class="nav-link">
          <i class="nc-icon nc-single-02 nav-icon"></i>
          <p>پروفایل</p>
        </a>
      </li>
      <li class="nav-item w-100 text-right">
        <a href="{{ route('user.changepassword') }}" class="nav-link">
          <i class="nc-icon nc-key-25 nav-icon"></i>
          <p>تغییر رمز ورود</p>
        </a>
      </li>
      </li>

      <li class="mx-auto w-100">
        {{Form::open(['route' => 'logout' , 'method' => 'POST', "class" => "w-100"   ])}}
        <input type="submit" class="btn btn-danger btn-block" value="خروج">
        {{Form::close()}}
      </li>
    </ul>
  </div>
</div>