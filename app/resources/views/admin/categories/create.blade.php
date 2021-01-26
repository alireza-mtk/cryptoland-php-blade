@extends('backend.layouts.app')

@section('title', 'Create Categories')

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
          <h1 class="m-0">ساخت دسته بندی جدید</h1>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
  <!-- /.content-header -->
  <div class="card card-user">
    <div class="card-body">
      {!! Form::open(['route' => 'admin.categories.store' , 'method' => 'POST']) !!}
      <div class="row">
        <div class="container">
        <div class="col-md-6 px-1">
          <div class="form-group">
            <label for="name">نام</label>
            <input type="text" name="name" class="form-control" value="{{ old("name") }}" required>
          </div>
        </div>

        <div class="update col-12 mx-auto w-100">
          <button type="submit" class="btn btn-primary btn-round ">ثبت</button>
        </div>
      </div>
        {!! Form::close() !!}
      </div>
    </div>
  </div>

  @endsection