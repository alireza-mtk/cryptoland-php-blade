@extends('backend.layouts.app')

@section('title', 'advertisement')

@push('styles')

@endpush

@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-10 text-right">
                    <h1>لیست پرداختی ها</h1>
                </div>
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
                                        <th>وضعیت</th>
                                        <th>بابت</th>
                                        <th>مبلغ</th>
                                        <th>نام پرداخت کننده</th>
                                        <th>شناسه</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($peyments as $item)
                                    <tr>
                                        <td>{{$item->transaction_id ? $item->transaction_id : 'تکمیل نشده'}}</td>
                                        <td>{{$item->user->email}}</td>
                                        <td>{{toPersianMoney($item->plan->price , true)}}</td>
                                        <td>{{$item->user->name}}</td>
                                        <td>{{$item->id}}</td>
                                    </tr>
                                    @endforeach
                                </tbody>
                                {{$peyments->links()}}
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