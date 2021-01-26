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
          <h4 class="card-title">پرداختی ها</h3>
        </div>


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
        <div class="card-body">
          <div class=" table-upgrade">
            <table class="table">
              <thead>
                <th class="text-center">پلن</th>
                <th class="text-center">مبلغ</th>
                <th class="text-center">مدت طرح</th>
                <th class="text-center">تاریخ</th>
              </thead>
              <tbody>
                <tr>
                  @foreach ($peyments as $item)
                  <td class="text-center my-1">{{$item->plan->name}}</td>
                  @endforeach

                  @foreach ($peyments as $item)
                  <td class="text-center my-1">{{toPersianMoney($item->plan->price)}}</td>
                  @endforeach

                  @foreach ($peyments as $item)
                  <td class="text-center my-1">{{$item->plan->duration}}</td>
                  @endforeach

                  @foreach ($peyments as $item)
                  <td class="text-center my-1">{{toPersianHumanReadableTime($item->created_at)}}</td>
                  @endforeach
                </tr>



                </tr>

              </tbody>

            </table>

          </div>
        </div>
      </div>
    </div>
  </div>
</div>
</div>


@endsection