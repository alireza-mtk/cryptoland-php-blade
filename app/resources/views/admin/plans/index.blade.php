
@extends('backend.layouts.app')

@section('title', 'Plans')

@push('styles')

@endpush

@push('scripts')
<script>
    function deletePlan(id){
            
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
                    document.getElementById('del-plan-'+id).submit();
                    swal(
                    'Deleted!',
                    'Plan has been deleted.',
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
            <h1>لیست پلن ها</h1>
        </div>
        <a class="btn btn-success" href="{{ route("admin.plans.create") }}">ساخت پلن جدید</a>    
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
                    <th>قیمت(تومان)</th>
                    <th>مدت</th>
                    <th>نام</th>
                </tr>
                </thead>
                <tbody>

                    @foreach($plans as $plan)
                        <tr>
                            <td>
                                <a href="{{route('admin.plans.edit',$plan->id)}}"
                                    class="btn btn-info btn-sm waves-effect">
                                    <i class="material-icons">تغییر</i>
                                </a>
                                <button type="button" class="btn btn-danger btn-sm waves-effect"
                                    onclick="deletePlan({{$plan->id}})">
                                    <i class="material-icons">حذف</i>
                                </button>
                                <form action="{{route('admin.plans.destroy',$plan->id)}}" method="POST"
                                    id="del-plan-{{$plan->id}}" style="display:none;">
                                    @csrf
                                    @method('DELETE')
                                </form> 
                            </td>
                            <td>{{ $plan->price }}</td>
                            <td>{{ $plan->duration }}</td>
                            <td>{{ $plan->name }}</td>
                        </tr>
                    @endforeach

                
                    </tbody>
              
                </table>
            </div>
            <!-- /.card-body -->
            </div>
            <!-- /.card -->

        {!! $plans->links() !!}
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

   