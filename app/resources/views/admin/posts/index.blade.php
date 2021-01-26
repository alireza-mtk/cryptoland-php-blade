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
                    'Post has been deleted.',
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
                    <h1>لیست پست ها</h1>
                </div>
                <a class="btn btn-success" href="{{ route("admin.posts.create") }}">ساخت پست جدید</a>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->

    <div class="container-fluid">
            <section class="content">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        
                        
                        <div class="card-body ">
                            <table id="example2" class="table table-bordered table-hover ">

                                <thead>
                                    <tr>
                                        <th>شماره</th>
                                        <th>عکس</th>
                                        <th>عنوان</th>
                                        <th>نویسنده</th>
                                        <th>دسته بندی</th>
                                        <th>وضعیت</th>
                                       
                                        <th> نظرات</th>
                                        <th width="150"></th>
                                    </tr>
                                </thead>

                                <tbody>
                                    @foreach( $posts as $key => $post )

                                    <tr>
                                        <td>{{$key+1}}</td>
                                        <td>
                                            @if($post->gallery &&
                                            Storage::disk('public')->exists('posts/'.$post->gallery->name))
                                            <img src="{{Storage::url('posts/'.$post->gallery->name)}}"
                                                alt="{{$post->name}}">
                                            @else
                                            <img src="{{Storage::url('posts/default.png')}}" alt="{{$post->name}}">
                                            @endif

                                        </td>
                                        <td>
                                            <span title="{{$post->title}}">
                                                {{ str_limit($post->title,10) }}
                                            </span>
                                        </td>
                                        <td>{{$post->user->name}}</td>

                                        <td>
                                            @foreach($post->categories as $key=>$category)
                                            @if($key!=0)
                                            <span>,</span>
                                            @endif
                                            {{$category->name}}
                                            @endforeach
                                        </td>
                                        <td>
                                            @if($post->status)
                                            نمایش
                                            @else
                                            چک نویس

                                            @endif
                                        </td>
                                       
                                        <td>
                                            <span class="badge">
                                                <i class="material-icons small left">comment</i>
                                                {{ $post->comments_count }}
                                            </span>
                                        </td>
                                        <td class="text-center">
                                            <a href="{{route('posts.single',$post->id)}}"
                                                class="btn btn-success btn-sm waves-effect">
                                                <i class="material-icons">نمایش</i>
                                            </a>
                                            <a href="{{route('admin.posts.edit',$post->id)}}"
                                                class="btn btn-info btn-sm waves-effect">
                                                <i class="material-icons">تغییر</i>
                                            </a>
                                            <button type="button" class="btn btn-danger btn-sm waves-effect"
                                                onclick="deleteItem({{$post->id}})">
                                                <i class="material-icons">حذف</i>
                                            </button>
                                            <form action="{{route('admin.posts.destroy',$post->id)}}" method="POST"
                                                id="del-item-{{$post->id}}" style="display:none;">
                                                @csrf
                                                @method('DELETE')
                                            </form>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                                @include("backend.partials.pagination", ["items" =>$posts])


                            </table>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->

                    {!! $posts->links() !!}
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
            <!-- /.container-fluid -->
        </section>
    </div>
    <!-- /.content -->
</div>
@endsection