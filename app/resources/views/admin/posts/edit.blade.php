@extends('backend.layouts.app')

@section('title', 'Edit Post')

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
          <h1 class="m-0">آپدیت پست</h1>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
  <!-- /.content-header -->
  <div class="card card-user">
    <div class="card-body">
      {!! Form::open(['route' => ['admin.posts.update',$post->id] , 'method' => 'PUT', 'enctype'
      =>"multipart/form-data"]) !!}
      <div class="row">

        <div class="col-lg-8 col-md-4 col-sm-12 col-xs-12">
          <div class="card">
            <div class="header">
              <h2>تغییر پست</h2>
            </div>
            <div class="body">

              <div class="form-group form-float">
                <div class="form-line">
                  <input type="text" name="title" class="form-control" value="{{$post->title}}">
                  <label class="form-label">عنوان پست</label>
                </div>
              </div>

              <div class="form-group">
                @if($post->status)
                @php
                $checked = 'checked';
                @endphp
                @else
                @php
                $checked = '';
                @endphp
                @endif
                <input type="checkbox" id="published" name="status" class="filled-in" value="1" {{$checked}} />
                <label for="published">منتشر شده ها</label>
              </div>
              <hr>
              <div class="form-group">
                <label for="">Body</label>
                <textarea name="body" id="tinymce">{{$post->body}}</textarea>
              </div>

            </div>
          </div>
        </div>
        <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
          <div class="card">
            <div class="header">
              <h2>انتخاب دسته بندی</h2>
            </div>
            <div class="body">
              <div class="form-group form-float">
                <div class="form-line {{$errors->has('categories') ? 'focused error' : ''}}">
                  <label for="categories">Select Category</label>
                  <select name="categories[]" class="form-control show-tick" id="categories" multiple
                    data-live-search="true">
                    @foreach($categories as $category)
                    <option value="{{$category->id}}" @if($post->categories->contains($category->id))
                      selected
                      @endif
                      >{{$category->name}}</option>
                    @endforeach
                  </select>
                </div>
              </div>
              <div class="form-group form-float">
                <div class="form-line {{$errors->has('tags') ? 'focused error' : ''}}">
                  <label for="tags">انتخاب تگ</label>
                  <select name="tags[]" class="form-control show-tick" id="tags" multiple data-live-search="true">
                    @foreach($tags as $tag)
                    <option value="{{$tag->id}}" @if($post->tags->contains($tag->id))
                      selected
                      @endif
                      >{{$tag->name}}</option>
                    @endforeach
                  </select>
                </div>
              </div>
              <div class="form-group">
                <label for="form-label">عکس نمایه</label>
                <input type="file" name="image">
              </div>
              <a href="{{route('admin.posts.index')}}" class="btn btn-danger btn-lg m-t-15 waves-effect">
                <i class="material-icons left">arrow_back</i>
                <span>بازگشت</span>
              </a>
              <button type="submit" class="btn btn-indigo btn-lg m-t-15 waves-effect">
                <i class="material-icons">save</i>
                <span>بروز رسانی</span>
              </button>

            </div>
          </div>
        </div>
        {!! Form::close() !!}
      </div>
    </div>
  </div>


  @endsection