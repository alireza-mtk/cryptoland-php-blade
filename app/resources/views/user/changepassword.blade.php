@extends('user.layout.app')

@section("style")
@endsection

@section("script")

@endsection
@section('main')
<div class="container mx-auto font-larg">
  <div class="row text-right">
    <div class="col-md-10 my-5 ">
      <div class="card card-user px-3">
        <div class="card-header">
          <h5 class="card-title text-center">تغییر رمز ورود</h5>
        </div>
        <div class="card-body">
          {{Form::open(['route' => 'user.changepassword.update' , 'method' => 'post'])}}
          <div class="row">
            <div class="col-md-12 px-1">
              <div class="form-group">
                <label>رمز کنونی</label>
                <input type="password" name="currentpassword" class="form-control" placeholder="رمز کنونی" required>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-12 px-1">
              <div class="form-group">
                <label>رمز جدید</label>
                <input type="password" name="newpassword" class="form-control" placeholder="رمز جدید" required>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-12 px-1">
              <div class="form-group">
                <label>تکرار رمز جدید</label>
                <input type="password" name="newpassword_confirmation" class="form-control"
                  placeholder="تکرار رمز جدید " required>
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