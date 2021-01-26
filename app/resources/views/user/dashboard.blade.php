@extends('user.layout.app')


@push("style")
<link href="https://fonts.googleapis.com/css?family=Quicksand" rel="stylesheet">

<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css">

@endpush

@push("script")
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>

@endpush


@section("main")
{{-- @include('user.navbar') --}}

<div class="wrapper d-rtl">
  <div class="main-panel">
    <div class="content">

      <div class="col-md-10 container">
        <div class="card card-user">
          <div class="image">
            <img src="{{asset("assets/user/assets/img/damir-bosnjak.jpg")}}" alt="...">
          </div>
          <div class="card-body">
            <div class="author">
              <a href="#">
                @if(Storage::disk('public')->exists('users/'. Auth::user()->image) &&
                Auth::user()->image)
                <img class="avatar border-gray" src="{{Storage::url('users/'.Auth::user()->image)}}"
                  alt="{{Auth::user()->name}}">
                @else
                <img class="avatar border-gray" src="{{Storage::url('users/default.png')}}"
                  alt="{{Auth::user()->name}}">
                @endif
                <h5 class="title text-center ">
                  @isset(Auth::user()->name)
                  {{Auth::user()->name}}
                  @else
                  کاربر جدید
                  @endisset

                </h5>
              </a>
            </div>
            <div class="row">

              <div class="col-10 mx-auto my-2">
                @if($featuredStatus)
                <div class="alert alert-primary alert-dismissible fade show text-right m-1">
                  <button type="button" aria-hidden="true" class="close" data-dismiss="alert" aria-label="Close">
                    <i class="nc-icon nc-simple-remove"></i>
                  </button>
                  <span>
                    شما در حال حاضر از طرح {{$featureRecord->plan->name}} استفاده میکنید
                  </span>
                </div>
                @else
                <div class="alert alert-primary alert-dismissible fade show text-right m-1">
                  <button type="button" aria-hidden="true" class="close" data-dismiss="alert" aria-label="Close">
                    <i class="nc-icon nc-simple-remove"></i>
                  </button>
                  <span>
                    شما در حال حاضر از طرح رایگان استفاده میکنید
                  </span>
                </div>
                @endif
              </div>


              <div class="col-lg-6 col-md-6 col-sm-6">
                <div class="card-dashboard card-stats">
                  <div class="card-body ">
                    <div class="row">
                      <div class="col-5 col-md-4">
                        <div class="icon-big text-center icon-warning">
                          <i class="nc-icon nc-sun-fog-29 text-danger"></i>
                        </div>
                      </div>
                      <div class="col-7 col-md-8">
                        <div class="numbers">
                          <p class="card-category">مدت باقی مانده از طرح شما</p>
                          <p class="card-title">
                            @isset($remainingDays)
                            {{$remainingDays}} روز
                            @else
                            رایگان
                            @endisset
                            <p>
                        </div>
                      </div>
                    </div>
                  </div>

                </div>
              </div>
              <div class="col-lg-6 col-md-6 col-sm-6">
                <div class="card-dashboard card-stats">
                  <div class="card-body ">
                    <div class="row">
                      <div class="col-5 col-md-4">
                        <div class="icon-big text-center icon-warning">
                          <i class="nc-icon nc-glasses-2 text-primary"></i>
                        </div>
                      </div>
                      <div class="col-7 col-md-8">
                        <div class="numbers">
                          <p class="card-category">تعداد بازدیدهای کل</p>
                          <p class="card-title">
                            @if(Auth::user()->job && Auth::user()->job->view_counts()->count() !== null)
                            {{Auth::user()->job->view_counts()->count()}}
                            @else
                            اطلاعات شغل تکمیل نیست
                            @endif
                            <p>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="row container">
            <div class="col-md-8 mx-auto">
              <div class="component-show-rate  rounded-lg col-md-12">
                <div class="content-left col-sm-3 col-md-4 p-3  flex-column justify-content-center align-items-center">
                  <p>امتیاز کل</p>
                  <div class="avg-rate font-weight-bold">
                    <span>7/</span>
                    <span>
                      @isset($rating)
                      {{
                      number_format((float)$averageRating, 1, '.', '')
                      }}
                      @else

                      @endisset
                    </span>
                  </div>
                  <div class="star-rate">
                    @if($averageRating < 1) 
                    <i class="far fa-star checked" ></i>
                    <i class="far fa-star checked" ></i>
                    <i class="far fa-star checked" ></i>
                    <i class="far fa-star checked" ></i>
                    <i class="far fa-star checked" ></i>
                    <i class="far fa-star checked" ></i>
                    <i class="far fa-star checked" ></i>
                      @elseif($averageRating == 1.5)
                      <i class="fa fa-star-half-alt checked"></i>
                      <i class="fa fa-star checked"></i>
                      <i class="far fa-star checked" ></i>
                      <i class="far fa-star checked" ></i>
                      <i class="far fa-star checked" ></i>
											<i class="far fa-star checked" ></i>
											<i class="far fa-star checked" ></i>

                      @elseif($averageRating == 2.0)
                      <i class="fa fa-star checked"></i>
                      <i class="fa fa-star checked"></i>
                      <i class="far fa-star checked" ></i>
                      <i class="far fa-star checked" ></i>
                      <i class="far fa-star checked" ></i>
											<i class="far fa-star checked" ></i>
											<i class="far fa-star checked" ></i>

                      @elseif($averageRating == 2.5)
                      <i class="fa fa-star-half-alt checked"></i>
                      <i class="fa fa-star checked"></i>
                      <i class="fa fa-star checked"></i>
                      <i class="far fa-star checked" ></i>
                      <i class="far fa-star checked" ></i>
                      <i class="far fa-star checked" ></i>
											<i class="far fa-star checked" ></i>

                      @elseif($averageRating == 3.0)
                      <i class="fa fa-star checked"></i>
                      <i class="fa fa-star checked"></i>
                      <i class="fa fa-star checked"></i>
                      <i class="far fa-star checked" ></i>
                      <i class="far fa-star checked" ></i>
                      <i class="far fa-star checked" ></i>
											<i class="far fa-star checked" ></i>

                      @elseif($averageRating == 3.5)
                      <i class="fa fa-star-half-alt checked"></i>
                      <i class="fa fa-star checked"></i>
                      <i class="fa fa-star checked"></i>
                      <i class="fa fa-star checked"></i>
                      <i class="far fa-star checked" ></i>
											<i class="far fa-star checked" ></i>
											<i class="far fa-star checked" ></i>

                      @elseif($averageRating == 4.0)
                      <i class="fa fa-star checked"></i>
                      <i class="fa fa-star checked"></i>
                      <i class="fa fa-star checked"></i>
                      <i class="fa fa-star checked"></i>
											<i class="far fa-star checked" ></i>
											<i class="far fa-star checked" ></i>
											<i class="far fa-star checked" ></i>

                      @elseif($averageRating == 4.5)
                      <i class="fa fa-star-half-alt checked"></i>
                      <i class="fa fa-star checked"></i>
                      <i class="fa fa-star checked"></i>
                      <i class="fa fa-star checked"></i>
                      <i class="fa fa-star checked"></i>
                      <i class="far fa-star checked" ></i>
											<i class="far fa-star checked" ></i>

                      @elseif($averageRating == 5.0)
                      <i class="fa fa-star checked"></i>
                      <i class="fa fa-star checked"></i>
                      <i class="fa fa-star checked"></i>
                      <i class="fa fa-star checked"></i>
                      <i class="fa fa-star checked"></i>
                      <i class="far fa-star checked" ></i>
                      <i class="far fa-star checked" ></i>
                      
                      @elseif($averageRating == 5.5)
                      <i class="fa fa-star-half-alt checked"></i>
                      <i class="fa fa-star checked"></i>
                      <i class="fa fa-star checked"></i>
                      <i class="fa fa-star checked"></i>
                      <i class="fa fa-star checked"></i>
                      <i class="fa fa-star checked"></i>
                      <i class="far fa-star checked" ></i>
                      @elseif($averageRating == 6.0)
                      <i class="fa fa-star checked"></i>
                      <i class="fa fa-star checked"></i>
                      <i class="fa fa-star checked"></i>
                      <i class="fa fa-star checked"></i>
                      <i class="fa fa-star checked"></i>
                      <i class="fa fa-star checked"></i>
                      <i class="far fa-star checked" ></i>
                      @elseif($averageRating == 6.5)
                      <i class="fa fa-star-half-alt checked"></i>
                      <i class="fa fa-star checked"></i>
                      <i class="fa fa-star checked"></i>
                      <i class="fa fa-star checked"></i>
                      <i class="fa fa-star checked"></i>
                      <i class="fa fa-star checked"></i>
                      <i class="fa fa-star checked"></i>

                      @elseif($averageRating == 7.0)
                      <i class="fa fa-star checked"></i>
                      <i class="fa fa-star checked"></i>
                      <i class="fa fa-star checked"></i>
                      <i class="fa fa-star checked"></i>
                      <i class="fa fa-star checked"></i>
                      <i class="fa fa-star checked"></i>
                      <i class="fa fa-star checked"></i>


                      @else <i class="fa fa-star-half-alt checked"></i>
                      اطلاعاتی برای نمایش وجود ندارد
                      @endif

                  </div>

                </div>
                <div
                  class="content-center col-sm-6 col-md-10 p-3 d-flex flex-column justify-content-center align-items-center">

                  @foreach($ratingStatistics as $key => $value)
                 
                  <div class="star-percent d-flex align-items-center">
                    <div class="mr-2">{{$key}}<i class="fa fa-star"></i></div>
                    <div class="progress mr-2">
                      <div class="progress-bar bg-success" role="progressbar" aria-valuenow="{{count($rating) ? $value / count($rating) * 100 : 0}}"
                        aria-valuemin="0" aria-valuemax="100" style='width: {{count($rating) ? $value / count($rating) * 100 : 0}}%;'></div>
                    </div>
                    <div class="percent">
                      {{count($rating) ? $value / count($rating) * 100 : 0}}%</div>
                  </div>
                 
                 
                  @endforeach

                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
</div>
</div>



@endsection