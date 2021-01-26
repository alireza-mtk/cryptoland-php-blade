@extends('frontend.layouts.app')


@push("style")
<link href="https://fonts.googleapis.com/css?family=Quicksand" rel="stylesheet">
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css">

@endpush

@push("script")
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
<script src="https://cdn.ckeditor.com/ckeditor5/11.0.1/classic/ckeditor.js"></script>
<script>
   ClassicEditor
            .create( document.querySelector( '#editor' ) )
            .catch( error => {
                console.error( error );
            } );
</script>
@endpush

@section("main")

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/froala-editor/3.2.5/css/froala_style.min.css">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/froala-editor/3.2.5/js/froala_editor.min.js"></script>
  <script>
    new FroalaEditor('textarea#froala-editor')
  </script>


<div class="container mx-auto font-larg">
  <div class="row text-right">
    <div class="col-md-10 my-5 ">
      <div class="card card-user px-3">
        <div class="card-header">
          <h5 class="card-title text-center">تکمیل اطلاعات شغل</h5>
        </div>
        <div class="card-body">
          {{Form::open(['route' => 'user.job.update' , 'method' => "post","enctype" => "multipart/form-data"])}}
          <div class="row">
            <div class="col-md-4 pr-1">
              <div class="form-group">
                <label>نام شغل</label>
                <input type="text" name="title" class="form-control" placeholder="title"
                  value="@isset($job->title){{ $job->title }}@endisset">
              </div>
            </div>
            <div class="col-md-4 px-1">
              <div class="form-group">
                <div class="form-group">
                  <label for="job_category">دسته بندی شغلی</label>
                  <select class="custom-select form-control-border w-100" id="job_category" name="job_category"
                    placeholder='-- لطفا انتخاب کنید --'>
                    @foreach($jobcategories as $key => $category)
                    <option value="{{$key}}" @isset($job->job_category_id) @if($key==$job->job_category_id))
                      selected="selected"@endif @endisset>
                      {{$category}}
                    </option>
                    @endforeach
                  </select>
                </div>

              </div>
            </div>
            <div class="col-md-4 pl-1">
              <div class="form-group">
                <label for="city_id">شهر</label>
                <select class="custom-select form-control-border w-100" id="city_id" name="city_id"
                  placeholder='-- لطفا انتخاب کنید --'>
                  @foreach($cities as $key => $city)
                  <option value="{{$key}}" @isset($job->city_id)
                    @if($key==$job->city_id)) selected="selected"@endif
                    @endisset
                    >
                    {{$city}}
                  </option>
                  @endforeach
                </select>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-6 pr-1">
              <div class="form-group">
                <label>اینستاگرام</label>
                <input type="text" name="instagram" class="form-control" placeholder="اینستاگرام"
                  value="@isset($job->instagram){{$job->instagram}}@endisset">
              </div>
            </div>
            <div class="col-md-6 px-1">
              <div class="form-group">
                <label>واتس آپ</label>
                <input type="text" name="whatsapp" class="form-control" placeholder="واتس آپ"
                  value="@isset($job->whatsapp){{$job->whatsapp}}@endisset">
              </div>
            </div>
            <div class="col-md-6 pr-1">
              <div class="form-group">
                <label>توییتر</label>
                <input type="text" name="tweeter" class="form-control" placeholder="توییتر"
                  value="@isset($job->tweeter){{$job->tweeter}}@endisset">
              </div>
            </div>
            <div class="col-md-6 px-1">
              <div class="form-group">
                <label>فیس بوک</label>
                <input type="text" name="facebook" class="form-control" placeholder="فیس بوک"
                  value="@isset($job->facebook){{$job->facebook}}@endisset">
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-12 px-1">
              <div class="form-group">
                <label>آدرس</label>
                <input type="text" name="address" class="form-control" placeholder="آدرس دقیق"
                  value="@isset($job->address){{$job->address}}@endisset">
              </div>
            </div>
            <div class="col-md-12 px-1">
              <div class="form-group">
                <label>وبسایت</label>
                <input type="text" name="website" class="form-control" placeholder="وبسایت"
                  value="@isset($job->website){{$job->website}}@endisset">
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-12">
              <div class="form-group">
                <div class="form-line">
                  <textarea class="form-control" name="description" id="editor"
                    rows="3">@isset($job->description){{$job->description}}@endisset</textarea>
                </div>
              </div>
            </div>
          </div>
          <div class="center">
            <div class="form-input">
              <label for="file-ip-1">بارگزاری عکس</label>
              <input type="file" name="gallaryimage[]" id="file-ip-1" accept="image/*" multiple
                onchange="showPreview(event);">
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