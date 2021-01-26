
@extends('backend.layouts.app')

@section('title', 'Job Group')

@push('styles')

@endpush

@push('scripts')
<script>
    function deleteGroup(id){
            
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
                    document.getElementById('del-group-'+id).submit();
                    swal(
                    'Deleted!',
                    'Job Group has been deleted.',
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
        <div class="col-10 text-right">
            <h1>لیست گروه ها شغلی</h1>
        </div>
        <a class="btn btn-success" href="{{ route("admin.jobgroups.create") }}">ساخت گروه شغلی جدید</a>    
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
                    <th>نام</th>
                </tr>
                </thead>
                <tbody>

                    @foreach($jobgroups as $group)
                        <tr>
                            <td>
                                <a href="{{route('admin.jobgroups.edit',$group->id)}}"
                                    class="btn btn-info btn-sm waves-effect">
                                    <i class="material-icons">تغییر</i>
                                </a>
                                <button type="button" class="btn btn-danger btn-sm waves-effect"
                                    onclick="deletePlan({{$group->id}})">
                                    <i class="material-icons">حذف</i>
                                </button>
                                <form action="{{route('admin.jobgroups.destroy',$group->id)}}" method="POST"
                                    id="del-group-{{$group->id}}" style="display:none;">
                                    @csrf
                                    @method('DELETE')
                                </form> 
                            </td>
                            <td>{{ $group->name }}</td>
                        </tr>
                    @endforeach

                
                    </tbody>
              
                </table>
            </div>
            <!-- /.card-body -->
            </div>
            <!-- /.card -->

        {!! $jobgroups->links() !!}
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

   