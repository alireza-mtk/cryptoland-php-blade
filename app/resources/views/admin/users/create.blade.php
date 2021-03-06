
{{ dd("sdggds") }}
@extends('backend.layouts.app')

@section('title', 'Users')

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
<div class="content-wrapper" >
    <!-- Content Header (Page header) -->
    <section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
        <div class="col-12">
            <h1>لیست کاربرها</h1>
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
                <h3 class="card-title">DataTable with minimal features & hover style</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <table id="example2" class="table table-bordered table-hover">
                <thead>
                <tr>
                    <th>Actions</th>
                    <th>ایمیل</th>
                    <th>شماره تلفن</th>
                    <th>نام</th>
                </tr>
                </thead>
                <tbody>

                    @foreach($users as $user)
                        <tr>

                            <td>
                                <a href="{{route('admin.users.update',$user->id)}}"
                                    class="btn btn-info btn-sm waves-effect">
                                    <i class="material-icons">edit</i>
                                </a>
                                <button type="button" class="btn btn-danger btn-sm waves-effect"
                                    onclick="deleteCategory({{$user->id}})">
                                    <i class="material-icons">delete</i>
                                </button>
                                <form action="{{route('admin.users.destroy',$user->id)}}" method="POST"
                                    id="del-category-{{$user->id}}" style="display:none;">
                                    @csrf
                                    @method('DELETE')
                                </form> 
                            </td>
                            <td>{{ $user->email }}</td>
                            <td>{{ $user->phone_number }}</td>
                            <td>{{ $user->name }}</td>
                        </tr>
                    @endforeach

                
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

   