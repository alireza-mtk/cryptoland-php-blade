@extends('backend.layouts.app')

@section('title', 'Comments')

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
                    document.getElementById('comment-item-'+id).submit();
                    swal(
                    'Deleted!',
                    'Comment has been deleted.',
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
                <div class="col-9 text-right">
                    <h1>لیست کامنتها</h1>
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
                                        <th></th>
                                        <th>متن پیام</th>
                                        <th>نام</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($comments as $item)
                                    <tr>
                                        <td>
                                            <form action="{{route('admin.comments.update',$item->id)}}" method="POST"
                                                class="inline-form">
                                                <button type="submit"
                                                    class="btn @if($item->approved) btn-danger @else btn-info @endif btn-sm waves-effect">
                                                    <i class="material-icons">@if($item->approved)
                                                        تعلیق
                                                        @else
                                                        تایید
                                                        @endif</i>
                                                </button>
                                                @csrf
                                            </form>
                                            <button type="button" class="btn btn-danger btn-sm waves-effect"
                                                onclick="deleteItem({{$item->id}})">
                                                <i class="material-icons">حذف</i>
                                            </button>
                                            <form action="{{route('admin.comments.destroy',$item->id)}}" method="POST"
                                                id="comment-item-{{$item->id}}" style="display:none;">
                                                @csrf
                                                @method('DELETE')
                                            </form>
                                        </td>
                                        <td>{{ $item->message }}</td>
                                        <td>{{ $item->user->name }}</td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->

                    {!! $comments->links() !!}
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