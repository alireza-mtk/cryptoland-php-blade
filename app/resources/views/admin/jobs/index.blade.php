@extends('backend.layouts.app')

@section('title', 'jobs')

@push('styles')

@endpush

@push('scripts')
<script>
    function deleteCategory(id){
            
            swal.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            type: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                console.log(result.value);
                if (result.value) {
                    document.getElementById('del-category-'+id).submit();
                    swal(
                    'Deleted!',
                    'Category has been deleted.',
                    'success'
                    )
                }
            })
        }
</script>


@endpush


@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row  mb-2">
                <div class="col-10 text-right">
                    <h1>لیست مشاغل</h1>

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

                        <div class="card-body">
                            <table id="example2" class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th></th>
                                        <th>سرگروه شغل</th>
                                        <th>نام</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($jobs as $item)

                                    <tr>
                                        <td>
                                            <button type="button" class="btn btn-danger btn-sm waves-effect">
                                                <i class="material-icons">حذف</i>
                                            </button>
                                            <form action="#" method="POST" style="display:none;">
                                                @csrf
                                                @method('DELETE')
                                            </form>
                                        </td>
                                        <td>{{$item->job_category->job_group->name}}</td>
                                        <td>{{$item->title}}</td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>

                            {{$jobs->links()}}
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