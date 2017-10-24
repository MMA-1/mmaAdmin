@extends('main')
@section('title', '| Messages')
@section('stylesheet')
    {!! Html::style('assets/plugins/dataTables/dataTables.bootstrap.css') !!}
@endsection
@section('content')
    <div class="inner">
        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Messages
                    </div>
                    <div class="panel-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered table-hover" id="dtPosts">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Contact</th>
                                    <th>Message</th>
                                    <th>Created At</th>
                                    <th>status</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($messages as $msg)
                                    <tr>
                                        <td>{{ $msg->id }}</td>
                                        <td>{{ $msg->name }}</td>
                                        <td>{{$msg->email }}</td>
                                        <td>
                                            {{$msg->contact }}
                                        </td>
                                        <td>{{$msg->message}}</td>
                                        <td>{{ date('d-M-Y', strtotime($msg->created_at)) }}</td>
                                        <td><a href="{{route('message.show',$msg->id)}}" class="btn btn-info btn-sm">{{$msg->status}}</a></td>
                                    </tr>
                                @endforeach


                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection
@section('scripts')
    {!! Html::script('assets/plugins/dataTables/jquery.dataTables.js') !!}
    {!! Html::script('assets/plugins/dataTables/dataTables.bootstrap.js') !!}
    <script>
        $(document).ready(function () {
            $('#dtPosts').dataTable({
                "order": [[ 0, "desc" ]]
            });
        });
    </script>
@endsection