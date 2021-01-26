@extends('backend.layouts.app')

@section('title', 'Create advertisement')

@push('styles')

<link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-fileinput/4.4.5/css/fileinput.min.css" media="all"
    rel="stylesheet" type="text/css" />
<link href="{{ asset('assets/css/create-property.css') }}" rel="stylesheet">

@endpush


@section('content')

<div class="block-header"></div>

<div class="row clearfix">



    {{Form::open(["class"=>"col-md-12 row"   , "route" => "admin.advertisements.store" , "method" => "post", 'style' => "justify-content: right",       "enctype"=>"multipart/form-data"
            ])}}

    @csrf
    <div class="px-5">
        <div class="card">
            <div class="header bg-indigo">
                <h2>ساخت آگهی جدید</h2>
            </div>
            <div class="body row">

                <div class="col-md-6 form-group form-float">
                    <div class="form-line">
                        <label class="control-label" for="title">عنوان:</label>
                        <input type="text" name="title" class="form-control" value="{{old('title')}}" required>

                    </div>
                </div>

                <div class="col-md-6 form-group form-float">
                    <div class="form-line">
                        <label class="control-label" for="title">آدرس:</label>
                        <input type="text" class="form-control" name="address" value="{{old('address')}}" required />

                    </div>
                </div>

                <div class="col-md-6 form-group form-float">
                    <div class="form-line">
                        <label class="control-label" for="alley">شماره کوچه:</label>
                        <input type="text" class="form-control" name="alley" value="{{old('alley')}}" required>

                    </div>
                </div>

                <div class="col-md-6 form-group px-3">
                    <label for="neighborhood_id">محله:</label>
                    <select name="neighborhood_id" class="form-control show-tick border bg-light" id="neighborhood_id" placeholder='-- لطفا انتخاب کنید --'>
                        @foreach($neighborhoods as $key => $neighborhood)
                            <option value="{{$key}}" @if($key == old('neighborhood_id')))selected="selected"@endif>
                                {{$neighborhood}}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="col-md-6 form-group form-float">
                    <div class="form-line">
                        <label class="control-label" for="portion_number">شماره قطعه:</label>
                        <input type="number" class="form-control" name="portion_number" value="{{old('portion_number')}}"
                            required>

                    </div>
                </div>


                <div class="col-md-6 form-group form-float">
                    <div class="form-line">
                        <label class="control-label" for="area">متراژ:</label>
                        <input type="number" class="form-control" name="area" value="{{old('area')}}" required>
                    </div>
                </div>




                <div class="col-md-6 form-group form-float">
                    <div class="form-line">
                        <label class="control-label" for="price">قیمت:</label>
                        <input type="number" class="form-control" name="price" value="{{old('price')}}" required>

                    </div>
                </div>

                <div class="col-md-6 form-group px-3">
                    <label for="bedroom">اتاق خواب:</label>
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
                    old('bedroom')
                    ,
                    [
                    'placeholder' => '-- لطفا انتخاب کنید --',
                    'class' => 'form-control show-tick border bg-light',
                    'id' => 'bedroom',
                    'name'=>"bedroom"])
                    !!}

                </div>
                <div class="col-md-6 form-group px-3">
                    <label for="deed">وضعیت سند</label>

                    {!!
                    Form::select(
                    'deed',
                    [
                    true => 'سند دارد' ,
                    false => 'سند ندارد' ,
                    ],
                    old('deed'),
                    [
                    'placeholder' => '-- لطفا انتخاب کنید --',
                    'class' => 'form-control show-tick border bg-light',
                    'id' => 'deed',
                    'name'=>"deed"])
                    !!}
                </div>
                <div class="col-md-6 form-group px-3">
                    <label for="status">وضعیت</label>

                    {!!
                    Form::select(
                    'status',
                    [
                    true => 'باز' ,
                    false => 'بسته' ,
                    ],
                    old('status'),
                    [
                    'placeholder' => '-- لطفا انتخاب کنید --',
                    'class' => 'form-control show-tick border bg-light',
                    'id' => 'status',
                    'name'=>"status"])
                    !!}

                </div>

                <div class="col-md-6 form-group px-3">
                    <label for="advertisement_type">دلیلی آگهی</label>
                    {!!
                    Form::select(
                    'advertisement_type',
                    [
                    "ویلایی" => 'ویلایی' ,
                    "زمین" => 'زمین' ,
                    "مغازه" => 'مغازه' ,
                    "آپاتمان" => 'آپاتمان' ,
                    ],
                    old('advertisement_type'),
                    [
                    'placeholder' => '-- لطفا انتخاب کنید --',
                    'class' => 'form-control show-tick border bg-light',
                    'id' => 'advertisement_type',
                    'name'=>"advertisement_type"])
                    !!}
                </div>

                <div class="col-md-6 form-group px-3">
                    <label for="purpose">نوع ملک</label>
                    {!!
                    Form::select(
                    'purpose',
                    [
                    "فروش" => 'فروش' ,
                    "اجاره" => 'اجاره' ,
                    "رهن" => 'رهن' ,
                    ],
                    old('purpose'),
                    [
                    'placeholder' => '-- لطفا انتخاب کنید --',
                    'class' => 'form-control show-tick border bg-light',
                    'id' => 'purpose',
                    'name'=>"purpose"])
                    !!}
                </div>
                <div class="col-md-6 form-group">
                    <input type="checkbox" id="featured" name="featured" class="filled-in" @if(old('featured')) checked
                        @endif />
                    <label for="featured">ویژه</label>
                </div>


                <div class="col-md-12 form-group">
                    <input id="input-id" type="file" name="gallaryimage[]" class="file" data-preview-file-type="text"
                        multiple>
                </div>

                <div class="col-md-12 form-group">
                    <label class="control-label" for="tinymce-selector2">توضیحات:</label>
                    <textarea class="form-control validate" name="description" id="tinymce-selector2"
                        rows="6">{{old('description')}}</textarea>
                </div>

                {{-- BUTTON --}}
                <div class="col-md-6 text-center form-group">
                    <a href="{{route('admin.properties.index')}}" class="btn btn-danger btn-lg m-t-15 waves-effect">
                        <i class="material-icons left">arrow_back</i>
                        <span>بازگشت</span>
                    </a>
                </div>
                <div class="col-md-6 text-center form-group">

                    <button type="submit" class="btn btn-indigo btn-lg m-t-15 waves-effect">
                        <i class="material-icons">save</i>
                        <span>ذخیره</span>
                    </button>
                </div>

            </div>
        </div>

    </div>

    {{Form::open()}}
</div>

@endsection


@push('scripts')
<link href="{{ asset('assets/js/create-property.js') }}" rel="stylesheet">

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

@endpush