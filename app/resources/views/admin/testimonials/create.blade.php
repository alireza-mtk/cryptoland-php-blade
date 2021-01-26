@extends('backend.layouts.app')

@section('title', 'Create Testimonial')

@push('styles')
<link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-fileinput/4.4.5/css/fileinput.min.css" media="all"
    rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/css/create-property.css') }}" rel="stylesheet">

@endpush


@section('content')

<div class="block-header">
    <a href="{{route('admin.testimonials.index')}}" class="waves-effect waves-light btn btn-danger right m-b-15">
        <i class="material-icons left">arrow_back</i>
        <span>بازگشت</span>
    </a>
</div>

<div class="row clearfix">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="card">
            <div class="header bg-indigo">
                <h2>ساخت نظر مشتریان</h2>
            </div>
            <div class="body">
                <form action="{{route('admin.testimonials.store')}}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <div class="form-group form-float">
                        <div class="form-line">
                            <label class="control-label" for="name">نام:</label>
                            <input type="text" name="name" class="form-control" value="{{ old("name") }}">
                           
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="form-line">
                            <label class="control-label" for="tinymce-selector2">متن نظر</label>
                            <textarea class="form-control validate" name="testimonial" id="tinymce-selector2" rows="6">{{ old("testimonial") }}</textarea>
                            
                        </div>
                    </div>

                    <div class="col-md-12 form-group">
                        <span class="btn btn-default btn-file d-flex align-items-center">
                            <input id="gallaryimage" name="image" type="file" class="file"
                                data-show-upload="true" data-show-caption="true">
                        </span>
                    </div>

                    <button type="submit" class="btn btn-indigo btn-lg m-t-15 waves-effect">
                        <i class="material-icons">save</i>
                        <span>ذخیره</span>
                    </button>

                </form>
            </div>
        </div>
    </div>
</div>

@endsection


@push('scripts')
{{-- <link href="{{ asset('assets/js/create-property.js') }}" rel="stylesheet"> --}}

<script src="{{asset('backend/plugins/tinymce/tinymce.js')}}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-fileinput/4.4.5/js/fileinput.min.js"></script>

<script src="{{ asset('backend/plugins/bootstrap-select/js/bootstrap-select.js') }}"></script>
<script src="{{asset('backend/plugins/tinymce/tinymce.js')}}"></script>
<script>
    $(function () {
            tinymce.init({
                selector: "textarea#tinymce-selector1",
                theme: "modern",
                height: 300,
                plugins: [
                    'advlist autolink lists link image charmap print preview hr anchor pagebreak',
                    'searchreplace wordcount visualblocks visualchars code fullscreen',
                    'insertdatetime media nonbreaking save table contextmenu directionality',
                    'emoticons template paste textcolor colorpicker textpattern imagetools'
                ],
                toolbar1: 'insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image',
                toolbar2: 'print preview media | forecolor backcolor emoticons',
                image_advtab: true
            });

            tinymce.init({
                selector: "textarea#tinymce-selector2",
                theme: "modern",
                height: 300,
                plugins: [
                    'advlist autolink lists link image charmap print preview hr anchor pagebreak',
                    'searchreplace wordcount visualblocks visualchars code fullscreen',
                    'insertdatetime media nonbreaking save table contextmenu directionality',
                    'emoticons template paste textcolor colorpicker textpattern imagetools'
                ],
                toolbar1: 'insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image',
                toolbar2: 'print preview media | forecolor backcolor emoticons',
                image_advtab: true
            });

            tinymce.suffix = ".min";
            tinyMCE.baseURL = '{{asset('backend/plugins/tinymce')}}';
        });
</script>
<script>
    $(function(){
        function showImage(fileInput,imgID){
            if (fileInput.files[0]) {
                var reader = new FileReader();
                reader.onload = function(e){
                    $(imgID).attr('src',e.target.result);
                    $(imgID).attr('alt',fileInput.files[0].name);
                }
                reader.readAsDataURL(fileInput.files[0]);
            }
        }
        $('#testimonial-image-btn').on('click', function(){
            $('#testimonial-image-input').click();
        });
        $('#testimonial-image-input').on('change', function(){
            showImage(this, '#testimonial-imgsrc');
        });
    })
</script>

@endpush