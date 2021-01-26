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

<div class="container mx-auto font-larg ">
  <div class="row">
    <div class="col-md-10 mt-5">
      <div class="card card-upgrade">
        <div class="card-header text-center">
          <h4 class="card-title">خرید طرح ویژه</h3>
        </div>
        <div class="card-body">
          <div class=" table-upgrade">
            <table class="table">
              <thead>
                <th></th>
                <th class="text-center"> طرح برنز</th>
                <th class="text-center"> طرح نقره ای</th>
                <th class="text-center">طرح طلایی </th>
              </thead>
              <tbody>
                <tr>
                  <td class="text-right">مدت آگهی</td>
                  @foreach ($plans as $item)
                  <td class="text-center my-1">{{$item->duration}} روز</td>
                  @endforeach
                </tr>
                {{-- <tr>
                  <td class="text-right">قرارگیری در آگهی ویژه،بنر و کاسب پر طرفدار</td>
                  <td class="text-center"><i class="nc-icon nc-simple-remove text-danger"></i></td>
                  <td class="text-center"><i class="nc-icon nc-simple-remove text-danger"></i></td>
                  <td class="text-center"><i class="nc-icon nc-check-2 text-success"></i></td>
                </tr>
                <tr>
                  <td class="text-right">قرارگیری در بنر و کاسب پر طرفدار</td>
                  <td class="text-center"><i class="nc-icon nc-simple-remove text-danger"></i></td>
                  <td class="text-center"><i class="nc-icon nc-check-2 text-success"></i></td>
                  <td class="text-center"><i class="nc-icon nc-check-2 text-success"></i></td>
                </tr>
                <tr>
                  <td class="text-right">قرارگیری در کاسب پر طرفدار</td>
                  <td class="text-center"><i class="nc-icon nc-check-2 text-success "></i></td>
                  <td class="text-center"><i class="nc-icon nc-check-2 text-success"></i></td>
                  <td class="text-center"><i class="nc-icon nc-check-2 text-success"></i></td>
                </tr> --}}

                <tr>
                  <td class="text-right">قیمت طرح</td>
                  @foreach ($plans as $item)
                  <td class="text-center my-1">{{toPersianMoney($item->price)}} تومان</td>
                  @endforeach
                </tr>
                <tr>
                  <td class="text-center"></td>
                  @foreach ($plans as $item)
                  <td class="text-center">
                    {{Form::open(['route' => 'user.plans.checkout' , 'method' => 'post', 'class' =>'text-center'])}}
                    <input type="hidden" name="id" value={{$item->id}}>
                    <button class="btn btn-round btn-primary-{{$item->name}}">خرید طرح {{$item->name}}</button>
                    {{Form::close()}}
                  </td>
                  @endforeach
                </tr>

              </tbody>

            </table>
            <div class="alert alert-warning alert-dismissible fade show text-right">
              <button type="button" aria-hidden="true" class="close" data-dismiss="alert" aria-label="Close">
                <i class="nc-icon nc-simple-remove"></i>
              </button>
              <span><b> توجه - </b> قبل از انجام خرید قوانین سایت را مطالعه نمایید. <a target="_blank" href="#"
                  class="btn btn-round btn-primary ">قوانین سایت</a></span>
            </div>
            <div class="alert alert-danger alert-dismissible fade show text-right">
              <button type="button" aria-hidden="true" class="close" data-dismiss="alert" aria-label="Close">
                <i class="nc-icon nc-simple-remove"></i>
              </button>
              <span><b>هشدار - </b>پس از خرید ، طرح قابل تعویض نمی باشد.</span>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
</div>


@endsection