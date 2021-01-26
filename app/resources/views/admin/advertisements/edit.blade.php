@extends('backend.layouts.app')

@section('title', 'Edit Advertisement')

@push('styles')

<link rel="stylesheet" href="{{asset('backend/plugins/bootstrap-select/css/bootstrap-select.css')}}">
<link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-fileinput/4.4.5/css/fileinput.min.css" media="all"
    rel="stylesheet" type="text/css" />

@endpush


@section('content')

<div class="block-header"></div>

<div class="row clearfix">



    <form action="{{route('admin.advertisements.update',$advertisement->id)}}" method="POST"
        enctype="multipart/form-data" class="">
        @csrf
        @method('PUT')
        <input type="hidden" name="id" value="{{$advertisement->id}}">
        <div class="">
            <div class="card">
                <div class="header bg-indigo">
                    <h2>تغییر ملک</h2>
                </div>
                <div class="body row">

                    <div class="col-12 col-md-6 form-group form-float">
                        <div class="form-line">
                            <input type="text" name="title" class="form-control" value="{{$advertisement->title}}">
                            <label class="form-label">عنوان ملک</label>
                        </div>
                    </div>



                    <div class="col-md-6 form-group form-float">
                        <div class="form-line">
                            <input type="text" class="form-control" name="address" value="{{$advertisement->address}}"
                                required>
                            <label class="form-label">ادرس</label>
                        </div>
                    </div>



                    <div class="col-md-6 form-group form-float">
                        <div class="form-line">
                            <input type="text" class="form-control" name="alley" value="{{$advertisement->alley}}"
                                required>
                            <label class="form-label">کوچه</label>
                        </div>
                    </div>



                    <div class="col-md-6 form-group form-float">
                        <div class="form-line">
                            <label>محله</label>


                            <select name="neighborhood_id" class="form-control show-tick border bg-light" id="neighborhood_id" placeholder='-- لطفا انتخاب کنید --'>
                                @foreach($neighborhoods as $neighborhood)
                                    <option value="{{$neighborhood->id}}" @if($neighborhood->id == $property->neighborhood_id)selected="selected"@endif>
                                        {{$neighborhood->name}}
                                    </option>
                                @endforeach
                            </select>

                        </div>
                    </div>


                    <div class="col-12 col-md-6 form-group form-float">
                        <div class="form-line">
                            <input type="number" name="portion_number" class="form-control"
                                value="{{$advertisement->portion_number}}" required>
                            <label class="form-label">شماره قطعه</label>
                        </div>
                    </div>



                    <div class="col-12 col-md-6 form-group form-float">
                        <div class="form-line">
                            <input type="number" class="form-control" name="area" value="{{$advertisement->area}}"
                                required>
                            <label class="form-label">مترا‌ژ</label>
                        </div>
                        <div class="help-info">مترا‌ژ</div>
                    </div>



                    <div class="col-12 col-md-6 form-group form-float">
                        <div class="form-line">
                            <input type="number" name="price" class="form-control" value="{{$advertisement->price}}"
                                required>
                            <label class="form-label">قیمت</label>
                        </div>
                    </div>

                    <div class="col-md-6 form-group form-float">
                        <div class="form-line">
                            <label>اتاق خواب</label>

                            {!!
                            Form::select(
                            'bedroom',
                            [
                            0 => '0',
                            1 => '1',
                            2 => '2',
                            3 => '3',
                            4 => '4',
                            5 => '5',
                            ],
                            $advertisement->bedroom,
                            [
                            'placeholder' => '-- لطفا انتخاب کنید --',
                            'class' => 'form-control show-tick border bg-light',
                            'id' => 'bedroom',
                            'name'=>"bedroom"])
                            !!}
                        </div>
                    </div>




                    <div class="col-md-6 form-group form-float">
                        <div class="form-line">
                            <label>وضعیت سند</label>
                            {!!
                            Form::select(
                            'deed',
                            [
                            true => 'سند دارد',
                            false => 'سند ندارد',
                            ],
                            $advertisement->deed,
                            [
                            'placeholder' => '-- لطفا انتخاب کنید --',
                            'class' => 'form-control show-tick border bg-light',
                            'id' => 'deed',
                            'name'=>"deed"])
                            !!}
                        </div>
                    </div>



                    <div class="col-md-6 form-group form-float">
                        <div class="form-line">
                            <label>وضعیت</label>

                            {!!
                            Form::select(
                            'status',
                            [
                            true => 'باز',
                            false => 'بسته',
                            ],
                            $advertisement->status,
                            [
                            'placeholder' => '-- لطفا انتخاب کنید --',
                            'class' => 'form-control show-tick border bg-light',
                            'id' => 'status',
                            'name'=>"status"])
                            !!}



                        </div>
                    </div>




                    <div class="col-md-6 form-group form-float">
                        <div class="form-line">
                            <label>دلیلی آگهی</label>

                            {!!
                            Form::select(
                            'advertisement_type',
                            [
                            'ویلایی' => 'ویلایی',
                            'زمین' => 'زمین',
                            'مغازه' => 'مغازه',
                            'آپاتمان' => 'آپاتمان',

                            ],
                            $advertisement->advertisement_type,
                            [
                            'placeholder' => '-- لطفا انتخاب کنید --',
                            'class' => 'form-control show-tick border bg-light',
                            'id' => 'advertisement_type',
                            'name'=>"advertisement_type"])
                            !!}

                        </div>
                    </div>



                    <div class="col-md-6 form-group form-float">
                        <div class="form-line">
                            <label>نوع ملک</label>


                            {!!
                            Form::select(
                            'purpose',
                            [
                            'فروش' => 'فروش',
                            'اجاره' => 'اجاره',
                            'رهن' => 'رهن',

                            ],
                            $advertisement->purpose,
                            [
                            'placeholder' => '-- لطفا انتخاب کنید --',
                            'class' => 'form-control show-tick border bg-light',
                            'id' => 'purpose',
                            'name'=>"purpose"])
                            !!}

                        </div>
                    </div>

                    <div class="col-md-6 form-group">
                        <input type="checkbox" id="featured" name="featured" class="filled-in"
                            {{$advertisement->featured ? 'checked' : ""}} />
                        <label for="featured">ویژه</label>
                    </div>

                    <div class="col-12 col-md-6 form-group">
                        <input id="input-id" type="file" name="gallaryimage[]" class="file"
                            data-preview-file-type="text" multiple>
                    </div>


                    <div class="col-12 form-group">
                        <label for="tinymce">Description</label>
                        <textarea name="description" id="tinymce">{{$advertisement->description}}</textarea>
                    </div>




                    {{-- BUTTON --}}
                    <div class="col-12 col-md-6 form-group">

                        <a href="{{route('admin.advertisements.index')}}"
                            class="btn btn-danger btn-lg m-t-15 waves-effect">
                            <i class="material-icons left">arrow_back</i>
                            <span>بازگشت</span>
                        </a>

                        <button type="submit" class="btn btn-indigo btn-lg m-t-15 waves-effect">
                            <i class="material-icons">save</i>
                            <span>ذخیره</span>
                        </button>
                    </div>

                </div>
            </div>



        </div>

    </form>
</div>


@endsection


@push('scripts')

<script src="{{ asset('backend/plugins/bootstrap-select/js/bootstrap-select.js') }}"></script>

<script>
    $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        // DELETE PROPERTY GALLERY IMAGE
        $('.gallery-image-edit button').on('click',function(e){
            e.preventDefault();
            var id = $(this).data('id');
            var image = $('#gallery-'+id+' img').attr('alt');
            $.post("{{route('admin.gallery-delete')}}",{id:id,image:image},function(data){
                if(data.msg == true){
                    $('#gallery-'+id).remove();
                }
            });
        });

        $(function() {
            // Multiple images preview in browser
            var imagesPreview = function(input, placeToInsertImagePreview) {

                if (input.files) {
                    var filesAmount = input.files.length;

                    for (i = 0; i < filesAmount; i++) {
                        var reader = new FileReader();

                        reader.onload = function(event) {

                            $('<div class="gallery-image-edit" id="gallery-perview-'+i+'"><img src="'+event.target.result+'" height="106" width="173"/></div>').appendTo(placeToInsertImagePreview);
                        }

                        reader.readAsDataURL(input.files[i]);
                    }
                }

            };

            $('#gallaryimageupload').on('change', function() {
                imagesPreview(this, 'div#gallerybox');
            });
        });

        $(document).on('click','#galleryuploadbutton',function(e){
            e.preventDefault();
            $('#gallaryimageupload').click();
        })

</script>

<script src="{{asset('backend/plugins/tinymce/tinymce.js')}}"></script>
<script>
    $(function () {
            tinymce.init({
                selector: "textarea#tinymce",
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

@endpush