@extends('backend.layouts.app')

@section('title', 'Create Post')

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
        <div class="col-10 text-right">
          <h1 class="m-0">ساخت پست های جدید</h1>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
  <!-- /.content-header -->
  <div class="card card-user">
    <div class="card-body">
      {!! Form::open(['route' => 'admin.posts.store' , 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
      <div class="row">

        <div class="col-lg-10 col-md-10 col-sm-12 col-xs-12 mx-auto">
          <div class="card">
            <div class="header">
              <h2>ساخت پست</h2>
            </div>
            <div class="body col-md-12">

              <div class="form-group form-float">
                <div class="form-line">
                  <label class="control-label" for="title">عنوان پست</label>
                  <input type="text" name="title" class="form-control" value="{{old('title')}}">

                </div>
              </div>

              <div class="form-group">
                <input type="checkbox" id="published" name="status" class="filled-in" value="1" />
                <label for="published">منتشر شده ها</label>
              </div>
              <hr>
              <div class="form-group">
                <label for="body">متن</label>
                <textarea class="form-control validate textarea" name="aboutus" id="tinymce-selector2"
                rows="6">{{old('body')}}</textarea>
              </div>

            </div>
          </div>
        </div>
        <div class="col-lg-10 col-md-10 col-sm-12 col-xs-12 mx-auto">
          <div class="card">
            <div class="header">
              <h2>انتخاب دسته بندی</h2>
            </div>
            <div class="body">

              <div class="form-group form-float">
                <div class="form-line {{$errors->has('categories') ? 'focused error' : ''}}">
                  <label>انتخاب دسته بندی</label>
                  <select name="categories[]" class="form-control show-tick" multiple data-live-search="true">
                    @foreach($categories as $category)
                    <option value="{{$category->id}}">{{$category->name}}</option>
                    @endforeach
                  </select>
                </div>
              </div>

              <div class="form-group form-float">
                <div class="form-line {{$errors->has('tags') ? 'focused error' : ''}}">
                  <label>انتخاب تگ</label>
                  <select name="tags[]" class="form-control show-tick" multiple data-live-search="true">
                    @foreach($tags as $tag)
                    <option value="{{$tag->id}}">{{$tag->name}}</option>
                    @endforeach
                  </select>
                </div>
              </div>

              <div class="col-md-12 form-group">
                <span class="btn btn-default btn-file d-flex align-items-center">
                  <input id="image" name="image" type="file" class="file" data-show-upload="true"
                    data-show-caption="true" required>
                </span>
              </div>


              <a href="{{route('admin.posts.index')}}" class="btn btn-danger btn-sm waves-effect">
               
                <span>بازگشت</span>
              </a>

              <button type="submit" class="btn btn-info btn-sm waves-effect">
             
                <span>ذخیره</span>
              </button>

            </div>
          </div>
        </div>
        {!! Form::close() !!}
      </div>
    </div>
  </div>

  @endsection