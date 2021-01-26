@extends('backend.layouts.app')

@section('title', 'Tags')

@push('styles')

@endpush

@push('scripts')
<script>
    function deleteItem(id){
            
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
                    document.getElementById('del-item-'+id).submit();
                    swal(
                    'Deleted!',
                    'Tag has been deleted.',
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
            <div class="row mb-2">
                <div class="col-10 text-right">
                    <h1>لیست تگ ها</h1>
                </div>
                <a class="btn btn-success" href="{{ route("admin.tags.create") }}">ساخت تگ جدید</a>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content ">
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
                                        <th>Slug</th>
                                        <th>تعداد پست</th>
                                        <th>نام</th>
                                        <th>شماره</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    @foreach( $tags as $key => $tag )
                                    <tr>
                                        <td class="text-center">
                                            <a href="{{route('admin.tags.edit',$tag->id)}}"
                                                class="btn btn-info btn-sm waves-effect">
                                                <i class="material-icons">تغییر</i>
                                            </a>
                                            <button type="button" class="btn btn-danger btn-sm waves-effect"
                                                onclick="deleteTag({{$tag->id}})">
                                                <i class="material-icons">حذف</i>
                                            </button>
                                            <form action="{{route('admin.tags.destroy',$tag->id)}}" method="POST"
                                                id="del-tag-{{$tag->id}}" style="display:none;">
                                                @csrf
                                                @method('DELETE')
                                            </form>
                                        </td>
                                        <td>{{$tag->slug}}</td>
                                        <td>{{$tag->posts->count()}}</td>
                                        <td>{{$tag->name}}</td>
                                        <td>{{$key+1}}</td>
                                    </tr>
                                    @endforeach
                                </tbody>
                                @include("backend.partials.pagination", ["items" =>$tags])


                            </table>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->

                    {!! $tags->links() !!}
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