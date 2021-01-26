@extends('backend.layouts.app')

@section('title', 'Create Feature')

@push('styles')


@endpush


@section('content')

<div class="block-header">
    <a href="{{route('admin.features.index')}}" class="waves-effect waves-light btn btn-danger right m-b-15">
        <i class="material-icons left">arrow_back</i>
        <span>بازگشت</span>
    </a>
</div>

<div class="row clearfix">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="card">
            <div class="header bg-indigo">
                <h2>ساخت نمایه</h2>
            </div>
            <div class="body">
                <form action="{{route('admin.features.store')}}" method="POST">
                    @csrf

                    <div class="form-group form-float">
                        <label class="control-label" for="name">نام نمایه:</label>
                        <div class="form-line">
                            <input type="text" name="name" class="form-control">
                       
                        </div>
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



@endpush