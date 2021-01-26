
@extends('layout.app')


@push("style")



@endpush

@push("script")

@endpush


@section("main")
@include("partials.header_title" , ["title" => "ثبت نام"])

<div class="container row mx-auto">

    <div class="col-sm-10 col-md-6 mx-auto float-none m-y-3">
       

        {!! Form::open(["route" => "register" , "method" => "POST"]) !!}
    
            <p class="before-login-text">به کاسب خوب خوش آمدید</p>
    
            <p class="form-row form-row-wide">
                <label for="phone_number">شماره تلفن<span class="required"></span></label>
                <input type="text" class="input-text" placeholder="شماره تلفن..." id="phone_number" type="phone_number" name="phone_number" value="{{ old('phone_number') }}" required
                />
            </p>

            <p class="form-row form-row-wide">
                <label for="name">نام<span class="required"></span></label>
                <input type="text" class="input-text" id="name" placeholder="نام..." type="name" name="name" value="{{ old('name') }}" required
                />
            </p>

            <p class="form-row form-row-wide">
                <label for="email">ایمیل<span class="required"></span></label>
                <input type="text" class="input-text" id="email"  placeholder="ایمیل..." type="email" name="email" value="{{ old('email') }}" required
                />
            </p>
    
            <p class="form-row form-row-wide">
                <label for="password">کلمه عبور<span class="required"></span></label>
                <input class="input-text" id="password"  placeholder=" کلمه عبور..." type="password"
                name="password" required autocomplete="new-password"/>
            </p>

            <p class="form-row form-row-wide">
                <label for="password_confirmation">تکرار کلمه عبور<span class="required"></span></label>
                <input class="input-text" id="password"  placeholder="تکرار کلمه عبور..." type="password"
                name="password_confirmation" required autocomplete="new-password"/>
            </p>
         
            <button type="submit" class="btn btn-warning btn-block">ثبت نام</button>

    
            <p class="lost_password m-t-3"><a href="{{ route("login") }}">قبلا ثبت نام کرده اید؟</a></p>
    

        {!! Form::close() !!}        
</div>

</div>

@endsection