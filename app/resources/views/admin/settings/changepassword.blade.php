@extends('backend.layouts.app')

@section('title', 'Change Password')

@push('styles')

@endpush


@section('content')
<div class="container mx-auto">
  <div class="row">
    <div class="col-md-10 mx-auto my-5">
      <div class="card card-user">
        <div class="card-header">
          <h5 class="card-title">تغییر کلمه عبور</h5>
        </div>
        <div class="card-body">
          <form action="{{route('admin.changepassword')}}" method="POST">
            @csrf
            <div class="row">
              <div class="container mx-auto">
              <div class="col-md-10 pr-1">
                <div class="form-group">
                  <div class="form-line">
                    <label class="control-label" for="currentpassword">کلمه عبور کنونی</label>
                    <input type="password" name="currentpassword" id="currentpassword" class="form-control" required>
                  </div>
                </div>
              </div>
              <div class="col-md-10 px-1">
                <div class="form-group">
                  <div class="form-line">
                    <label class="control-label" for="newpassword">کلمه عبور جدید</label>
                    <input type="password" name="newpassword" id="newpassword" class="form-control" required>
                  </div>
                </div>
              </div>
              <div class="col-md-10 pl-1">
                <div class="form-group">
                  <div class="form-line">
                    <label class="control-label" for="newpassword_confirmation">تکرار کلمه عبور جدید</label>
                    <input type="password" name="newpassword_confirmation" id="newpassword_confirmation"
                      class="form-control" required>
                  </div>
                </div>
              </div>
            </div>
            </div>

        </div>

        <div class="row">
          <div class="update ml-auto mr-auto">
            <button type="submit" class="btn btn-primary btn-round my-3">ذخیره</button>
          </div>
        </div>
        </form>
      </div>
    </div>
  </div>
</div>


@endsection


@push('scripts')


@endpush