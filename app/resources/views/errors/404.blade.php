@extends('layout.app')

@push("style")

@endpush

@push("script")
@endpush

@section("main")


<div class="innercontent">
  <div class="container py-5">

    <!--404 Start-->
    <div class="404-wrap wow fadeInUp my-5">
      <div class="row">
        <div class="col-12">
          <div class="four-zero-page text-center">
            <h2>404</h2>
            <h3>با عرض پوزش صفحه یافت نشد</h3>
            <p>صفحه مورد نظر در دسترس نیست یا حذف شده است.
              با استفاده از دکمه زیر سعی کنید به صفحه اصلی بروید.</p>
            <div class="readmore"> <a href="{{route("index")}}">به صفحه اصلی بروید</a> </div>
          </div>
        </div>
      </div>
    </div>

    <!--404 End-->

  </div>
</div>


@endsection