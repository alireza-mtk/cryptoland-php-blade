@extends('backend.layouts.app')

@section('title', 'Categories')

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
            <div class="row mb-2">
                <div class="col-10 text-right">
                    <h1>لیست دسته بندی ها</h1>
                </div>
                <a class="btn btn-success" href="{{ route("admin.categories.create") }}">ساخت دسته بندی جدید</a>
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
                                        <th>Slug</th>
                                        <th>شماره پست</th>
                                        <th>نام</th>
                                        <th>عکس</th>
                                        <th>شماره</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    @foreach( $categories as $key => $category )
                                    <tr>
                                        <td class="text-center">
                                            <a href="{{route('admin.categories.edit',$category->id)}}"
                                                class="btn btn-info btn-sm waves-effect">
                                                <i class="material-icons">تغییر</i>
                                            </a>
                                            <button type="button" class="btn btn-danger btn-sm waves-effect"
                                                onclick="deleteCategory({{$category->id}})">
                                                <i class="material-icons">حذف</i>
                                            </button>
                                            <form action="{{route('admin.categories.destroy',$category->id)}}"
                                                method="POST" id="del-category-{{$category->id}}" style="display:none;">
                                                @csrf
                                                @method('DELETE')
                                            </form>
                                        </td>
                                        <td>{{$category->slug}}</td>
                                        <td>{{$category->posts->count()}}</td>
                                        <td>{{$category->name}}</td>
                                        <td>
                                            @if(Storage::disk('public')->exists('category/thumb/'.$category->image))
                                            <img src="{{Storage::url('category/thumb/'.$category->image)}}"
                                                alt="{{$category->name}}" width="60" class="img-responsive img-rounded"
                                                style="width:40px;height:40px">
                                            @endif
                                        </td>
                                        <td>{{$key+1}}</td>
                                    </tr>
                                    @endforeach
                                </tbody>
                                @include("backend.partials.pagination", ["items" =>$categories])


                            </table>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->

                    {!! $categories->links() !!}
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