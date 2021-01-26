@extends('layout.app')


@push("style")

@endpush

@push("script")

@endpush


@section("main")
@include("partials.header_title" , ["title" => "ورود"])
<div class="container row mx-auto">

    <div class="col-sm-10 col-md-6 float-none m-y-3 mx-auto">

        {!! Form::open(["route" => "requestCode" , "method" => "POST"]) !!}
        <div class="before-login-text">به کاسب خوب خوش آمدید</div>
        <div class="m-t-1">
            <label for="phone_number">شماره تماس:<span class="required"></span></label>
            <input type="text" class="input-text" name="phone_number" id="phone_number"
                value="{{old('phone_number')}}" />
        </div>

        <div class="m-t-1">
            <input type="checkbox" id="privacy" name="privacy">
            <label for="privacy"> <a href="{{route('our-terms')}}" class="color-blue" target="_blank">
                    قوانین
                </a> را خوانده و قبول کرده ام</label>
        </div>
        <div class="">
            <button class="button" type="submit" value="Login" name="ورود">ورود</button>
        </div>
        {!! Form::close()
        !!}
    </div>
</div> @endsection