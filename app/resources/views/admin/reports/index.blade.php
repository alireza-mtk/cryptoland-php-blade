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
                    <h1>لیست شکایات ها</h1>
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
                                        <th>نام کاسب</th>
                                        <th>دلیل</th>
                                        <th>شغل مورد نظر</th>
                                        <th>کاربر</th>
                                        <th>شناسه</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($reports as $item)
                                    <tr>
                                        <td>{{$item->user->name}}</td>
                                        <td>{{$item->purpose}}</td>
                                        <td>
                                            <a target="_blank"
                                                href="{{route('jobs.show' , $item->job->id)}}">{{$item->job->title}}</a>
                                        </td>
                                        <td>{{$item->user->name}}</td>
                                        <td>{{$item->id}}</td>
                                    </tr>
                                    @endforeach
                                </tbody>
                                {{$reports->links()}}
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