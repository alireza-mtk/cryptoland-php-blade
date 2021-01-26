@extends('backend.layouts.app')

@section('title', 'Profile')

@push('styles')

@endpush


@section('content')


@endsection


@push('scripts')


 <!-- Content Wrapper. Contains page content -->
 <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-12 text-right">
            <h1 class="m-0">ساخت پلن جدید</h1>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    <div class="card card-user">
      <div class="card-body">
        {!! Form::open(['route' => 'admin.plans.store' , 'method' => 'POST']) !!}
          <div class="row">
            <div class="container">
            <div class="col-md-6 px-1">
              <div class="form-group">
                <label for="name">نام</label>
                <input type="text" id="name" name="name" class="form-control" placeholder="نام" value="{{ old("name") }}" required>
              </div>
            </div>

            <div class="col-md-6 px-1">
                <div class="form-group">
                  <label for="duration">مدت زمان</label>
                  <input type="number" id="duration" name="duration" class="form-control" placeholder="مدت زمان" value="{{ old("duration") }}" required>
                </div>
            </div>


            <div class="col-md-6 px-1">
                <div class="form-group">
                  <label for="price">قیمت</label>
                  <input type="number" id="price" name="price" class="form-control" placeholder="تومان" value="{{ old("price") }}" required>
                </div>
            </div>

        
        
            <div class="update col-12 mx-auto w-100">
              <button type="submit" class="btn btn-primary btn-round mx-auto">بروز رسانی</button>
            </div>
          </div>
        {!! Form::close() !!}
      </div>
    </div>
  </div>

@endpush