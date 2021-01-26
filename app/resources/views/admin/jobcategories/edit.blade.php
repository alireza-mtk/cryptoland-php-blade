@extends('backend.layouts.app')

@section('title', 'Job Group')

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
          <div class="col-12">
            <h1 class="m-0">آپدیت دسته بندی شغلی</h1>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    <div class="card card-user">
      <div class="card-body">
        {!! Form::open(['route' => ['admin.jobcategories.update',$jobcategory->id] , 'method' => 'PUT']) !!}
          <div class="row">
            <div class="col-md-6 px-1">
              <div class="form-group">
                <label for="name">نام</label>
                <input type="text" id="name" name="name" class="form-control" placeholder="نام" value="{{ $jobcategory->name }}" required>
              </div>
            </div>

            <div class="col-md-6 px-1">
              <div class="form-group">
                <label for="job_group_id">گروه شغلی</label>
                <select class="custom-select form-control-border w-100" id="job_group_id" name="job_group_id" placeholder='-- لطفا انتخاب کنید --'>
                  @foreach($jobgroups as $key => $group)
                  <option value="{{$key}}" @if($key == $jobcategory->job_group_id))selected="selected"@endif>
                    {{$group}}
                </option>                    
                @endforeach
                </select>
              </div>    
            </div>
        
            <div class="update col-12 mx-auto w-100">
              <button type="submit" class="btn btn-primary btn-round mx-auto">بروز رسانی</button>
            </div>
        {!! Form::close() !!}
      </div>
    </div>
  </div>

@endpush