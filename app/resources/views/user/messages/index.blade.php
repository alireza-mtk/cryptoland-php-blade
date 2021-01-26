@extends('user.layout.app')

@section("style")
@endsection

@section("script")
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script>
    function deleteMessage(id){
            swal({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            icon: 'warning',
            buttons: true,
            dangerMode: true,
            buttons: ["Cancel", "Yes, delete it!"]
            }).then((value) => {
                if (value) {
                    document.getElementById('del-message-'+id).submit();
                    swal(
                    'Deleted!',
                    'Message has been deleted.',
                    'success',
                    {
                        buttons: false,
                        timer: 1000,
                    })
                }
            })
        }
</script>
@endsection

@section('main')

@include("partials.navbar")

@include("partials.header_title" , ["title" => "پیام ها"])
<section class="section justify-content-center py-5 mx-auto">
    <div class="container shadow-lg">
        <div class="row bg-light shadow-lg">

            <div class="col-md-3">
                <div class="user-sidebar bg-light py-3 my-3">
                    @include('user.sidebar')
                </div>
            </div>

            <div class="col s12 m9">

                <h4 class="user-title mt-5">پیام ها</h4>

                <div class="user-content table-responsive col-10 d-block">
                    <table class="table table-hover dashboard-task-infos mt-3">
                        <thead>
                            <tr>
                                <th>شماره</th>
                                <th>نام</th>
                                <th>ایمیل</th>
                                <th>پیام</th>
                                <th>فعال</th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach( $messages as $key => $message )
                            <tr>
                                <td class="right-align">{{$key+1}}.</td>
                                <td>{{ ucfirst(strtok($message->name,' ')) }}</td>
                                <td>{{ $message->email }}</td>
                                <td>
                                    <span class="tooltipped" data-position="bottom"
                                        data-tooltip="{{$message->message}}">
                                        {{ str_limit($message->message,20) }}
                                    </span>
                                </td>
                                <td>
                                    @if($message->status == 0)
                                    <a href="{{route('user.message.read',$message->id)}}"
                                        class="btn btn-small orange waves-effect">
                                        <i class="material-icons">local_library</i>
                                    </a>
                                    @else
                                    <a href="{{route('user.message.read',$message->id)}}"
                                        class="btn btn-small green waves-effect">
                                        <i class="material-icons">done</i>
                                    </a>
                                    @endif
                                    <a href="{{route('user.message.replay',$message->id)}}"
                                        class="btn btn-small indigo waves-effect">
                                        <i class="material-icons">replay</i>
                                    </a>
                                    <button type="button" class="btn btn-small red waves-effect"
                                        onclick="deleteMessage({{$message->id}})">
                                        <i class="material-icons">delete</i>
                                    </button>
                                    <form action="{{route('user.messages.destroy',$message->id)}}" method="POST"
                                        id="del-message-{{$message->id}}" style="display:none;">
                                        @csrf
                                        @method('DELETE')
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <div class="center">
                        {{ $messages->links() }}
                    </div>
                </div>

            </div>

        </div>
    </div>
</section>

@endsection