@extends('backend.layouts.app')

@section('title', 'advertisement')

@push('styles')

@endpush

@section('content')
<div class="content-wrapper" >
    <!-- Content Header (Page header) -->
    <section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
        <div class="col-10 text-right">
            <h1>لیست تبلیغات</h1>
            
        </div>
        <a class="btn btn-success" href="#">ساخت تبلیغ جدید</a>    
        </div>
    </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
    <div class="container-fluid">
        <div class="row">
        <div class="col-12">
            <div class="card">
            <div class="card-header">
               
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <table id="example2" class="table table-bordered table-hover">
                <thead>
                <tr>
                    <th></th>
                    <th>ایمیل</th>
                    <th>نام آگهی کننده</th>
                    <th>شناسه</th>
                </tr>
                </thead>
                <tbody>

          
                        <tr>

                            <td>
                                <a href="#"
                                    class="btn btn-info btn-sm waves-effect">
                                    <i class="material-icons">تغییر</i>
                                </a>
                                <button type="button" class="btn btn-danger btn-sm waves-effect"
                                    onclick="#">
                                    <i class="material-icons">حذف</i>
                                </button>
                                <form action="#" method="POST"
                                    id="#" style="display:none;">
                                    @csrf
                                    @method('DELETE')
                                </form> 
                            </td>
                            <td>jkaHDSAKDJ@GMAIL.COM</td>
                            <td>آقای مهدوی</td>
                            <td>1</td>
                        </tr>
                   
                
                    </tbody>
              
                </table>
            </div>
            <!-- /.card-body -->
            </div>
            <!-- /.card -->

     
        </div>
        <!-- /.col -->
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
 </div>

@endsection