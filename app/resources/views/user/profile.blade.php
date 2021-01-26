@extends('user.layout.app')

@section("style")

@endsection

@section("script")

@endsection

@section('main')
<div class="container mx-auto font-larg ">
  <div class="row text-right">
    <div class="col-md-10 my-5 ">
      <div class="card card-user px-3">
        <div class="card-header">
          <h5 class="card-title text-center">تغییر پروفیل</h5>
        </div>
        <div class="card-body">
          {{Form::open(['route' => 'user.profile.update' , 'method' => 'POST', "enctype" => "multipart/form-data"])}}
          <div class="row">
            <div class="col-md-6 pr-1">
              <div class="form-group">
                <label>نام</label>
                <input type="text" class="form-control" name="name" placeholder="نام" value={{$user->name}}>
              </div>
            </div>
            <div class="col-md-6 pl-1">
              <div class="form-group">
                <label>شماره تماس</label>
                <input type="text" class="form-control" name="phone_number" placeholder="شماره تلفن"
                  value={{$user->phone_number}} disabled>
              </div>
            </div>
          </div>
          <div class="center">
            <div class="form-input">
              <label for="file-ip-1">بارگزاری عکس</label>
              <input type="file" id="file-ip-1" name="image" accept="image/*" onchange="showPreview(event);">
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
          {{Form::close()}}
        </div>
      </div>
    </div>
  </div>
</div>
@endsection