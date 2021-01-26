@extends('backend.layouts.app')

@section('title', 'Profile')

@push('styles')

@endpush


@section('content')


@endsection


@push('scripts')
<div class="container mx-auto">
  <div class="row">
<div class="col-md-10 mx-auto d-rtl my-5">
    <div class="card card-user">
      <div class="card-header">
        <h5 class="card-title">تغییر پروفایل</h5>
      </div>
      <div class="card-body">
        <form>
          <div class="row">
            
            <div class="col-md-6 px-1">
              <div class="form-group">
                <label>نام کاربری</label>
                <input type="text" class="form-control" placeholder="نام کاربری" value="michael23">
              </div>
            </div>
            <div class="col-md-6 pl-1">
              <div class="form-group">
                <label for="exampleInputEmail1">ایمیل</label>
                <input type="email" class="form-control" placeholder="ایمیل">
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-6 pr-1">
              <div class="form-group">
                <label>نام</label>
                <input type="text" class="form-control" placeholder="نام" value="Chet">
              </div>
            </div>
            <div class="col-md-6 pl-1">
              <div class="form-group">
                <label>نام خانوادگی</label>
                <input type="text" class="form-control" placeholder="نام خانوادگی" value="Faker">
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-12">
              <div class="form-group">
                <label>آدرس</label>
                <input type="text" class="form-control" placeholder="آدرس" value="Melbourne, Australia">
              </div>
            </div>
          </div>
          
          <div class="row">
            <div class="col-md-12 ">
              <div class="form-group">
                <label>درباره من:    </label>
                <textarea class="form-control textarea">Oh so, your weak rhyme You doubt I'll bother, reading into it</textarea>
              </div>
            </div>
          </div>
          <div class="center">
            <div class="form-input">
              <label for="file-ip-1">بارگزاری عکس</label>
              <input type="file" id="file-ip-1" accept="image/*" onchange="showPreview(event);">
              <div class="preview">
                <img id="file-ip-1-preview">
              </div>
            </div>
          </div>
          <div class="row">
            <div class="update ml-auto mr-auto">
              <button type="submit" class="btn btn-primary btn-round">بروز رسانی</button>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
  </div>
</div>


@endpush