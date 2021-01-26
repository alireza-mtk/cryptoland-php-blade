@extends('layout.app')


@push("style")

@endpush

@push("script")

@endpush


@section("main")
@include("partials.header_title" , ["title" => "ورود"])
<div class="container row mx-auto">

    <div class="col-sm-10 col-md-6 float-none m-y-3 mx-auto">

        {!! Form::open(["route" => "verify" , "method" => "POST"]) !!}

        <p class="before-login-text">به کاسب خوب خوش آمدید</p>


        <p class="form-row form-row-wide">
            <label for="code">کد تایید:<span class="required"></span></label>
            <input class="input-text" type="text" name="code" id="code" />
        </p>

        <p class="form-row">

            <button class="button" type="submit" value="Login" name="ورود">ورود</button>
            {{-- <div class="boxes col-md-3">

                <input type="checkbox" id="box-2" name="featured">
                <label for="box-2">من را بخاطر بسپار</label>

            </div> --}}
        </p>

        {{-- <p class="lost_password"><a href="login-and-register.html">کلمه عبور را فراموش کردید؟</a></p> --}}

        {!! Form::close() !!}
    </div>

</div>

@endsection