@extends('backend.layouts.app')

@section('title', 'Settings')

@push('styles')

@endpush


@section('content')
<div class="container mx-auto">
  <div class="row">
    <div class="col-md-10 mx-auto my-5">
      <div class="card card-user">
        <div class="card-header">
          <h5 class="card-title">تنظیمات عمومی سایت</h5>
        </div>
        <div class="card-body">
          <form action="{{route('admin.settings.store')}}" method="POST">
            @csrf
            <div class="row">
              <div class="col-md-5 pr-1">
                <div class="form-group">
                  <div class="form-line">
                    <label class="control-label" for="name">عنوان سایت:</label>
                    <input type="text" name="name" class="form-control" value="{{ $settings->name  }}">

                  </div>
                </div>
              </div>
              <div class="col-md-3 px-1">
                <div class="form-group">
                  <div class="form-line">
                    <label class="control-label" for="email">ایمیل:</label>
                    <input type="email" name="email" class="form-control" value="{{ $settings->email }}">

                  </div>
                </div>
              </div>
              <div class="col-md-4 pl-1">
                <div class="form-group">
                  <div class="form-line">
                    <label class="control-label" for="phone">شماره تلفن:</label>
                    <input type="number" name="phone" class="form-control" value="{{ $settings->phone }}">

                  </div>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-6 pr-1">
                <div class="form-group">
                  <div class="form-line">
                    <label class="control-label" for="address">آدرس:</label>
                    <input type="text" name="address" class="form-control" value="{{ $settings->address }}">

                  </div>
                </div>
              </div>
              <div class="col-md-6 pl-1">
                <div class="form-group">
                  <div class="form-line">
                    <label class="control-label" for="footer">فوتر:</label>
                    <input type="text" name="footer" class="form-control" value="{{ $settings->footer }}">

                  </div>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-12">
                <div class="form-group">
                  <div class="form-line">
                    <label class="control-label" for="footer">درباره ما:</label>
                    <textarea class="form-control validate textarea" name="aboutus" id="tinymce-selector2"
                      rows="6">{{ $settings->aboutus }}</textarea>
                  </div>
                </div>
              </div>
            </div>
            <h6 class="text-right">شبکه های اجتماعی:</h6>
            <br>
            <div class="row">
              <div class="col-md-12 pr-1">
                <div class="form-group">
                  <div class="form-line">
                    <label class="control-label" for="whatsapp">Whatsapp</label>
                    <input type="text" name="whatsapp" class="form-control" value="{{ $settings->whatsapp }}">

                  </div>
                </div>
              </div>
              <div class="col-md-12 px-1">
                <div class="form-group">
                  <div class="form-line">
                    <label class="control-label" for="telegram">Telegram</label>
                    <input type="text" name="telegram" class="form-control" value="{{ $settings->telegram }}">
                  </div>
                </div>
              </div>
              <div class="col-md-12 pl-1">
                <div class="form-group">
                  <div class="form-line">
                    <label class="control-label" for="instagram">Instagram</label>
                    <input type="text" name="instagram" class="form-control" value="{{ $settings->instagram }}">
                  </div>
                </div>
              </div>
              <div class="col-md-12 pl-1">
                <div class="form-group">
                  <div class="form-line">
                    <label class="control-label" for="linkedin">Linkedin</label>
                    <input type="text" name="linkedin" class="form-control" value="{{ $settings->linkedin }}">
                  </div>
                </div>
              </div>
            </div>


            <div class="row">
              <div class="update ml-auto mr-auto">
                <button type="submit" class="btn btn-primary btn-round">ذخیره</button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection


@push('scripts')


@endpush