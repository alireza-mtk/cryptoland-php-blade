@extends('backend.layouts.app')

@section('title', 'Edit Category')

@push('styles')
@endpush


@push('scripts')
@endpush


@section('content')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-12 text-right">
          <h1 class="m-0">آپدیت دسته بندی</h1>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
  <!-- /.content-header -->
  <div class="card card-user">
    <div class="card-body">
      {!! Form::open(['route' => ['admin.categories.update',$category->id] , 'method' => 'PUT']) !!}
      <div class="row">
<div class="container">
        <div class="col-md-6 px-1">
          <div class="form-group">
            <label for="name">نام</label>
            <input type="text" id="name" name="name" class="form-control" placeholder="نام"
              value="{{ $category->name }}" required>
          </div>
        </div>

        <div class="update col-12 mx-auto w-100">
          <button type="submit" class="btn btn-primary btn-round">بروز رسانی</button>
        </div>
      </div>
        {!! Form::close() !!}
      </div>
    </div>
  </div>


  @endsection