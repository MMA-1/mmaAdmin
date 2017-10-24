@extends('main')
@section('title', '| Messages')
@section('content')
    <div class="inner">
        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Messages
                        <a class="btn btn-xs btn-primary pull-right" href="{{route('message.index')}}">Back</a>
                    </div>
                    <div class="panel-body">
                        <div class="table-responsive">
                            {{--<table class="table table-striped table-bordered table-hover" id="dtPosts">--}}
                                {{--<thead>--}}
                                {{--<tr>--}}
                                    {{--<th>#</th>--}}
                                    {{--<th>Name</th>--}}
                                    {{--<th>Email</th>--}}
                                    {{--<th>Contact</th>--}}
                                    {{--<th>Message</th>--}}
                                    {{--<th>Created At</th>--}}
                                    {{--<th>status</th>--}}
                                {{--</tr>--}}
                                {{--</thead>--}}
                                {{--<tbody>--}}
                                {{--@foreach($messages as $msg)--}}
                                    {{--<tr>--}}
                                        {{--<td>{{ $msg->id }}</td>--}}
                                        {{--<td>{{ $msg->name }}</td>--}}
                                        {{--<td>{{$msg->email }}</td>--}}
                                        {{--<td>--}}
                                            {{--{{$msg->contact }}--}}
                                        {{--</td>--}}
                                        {{--<td>{{$msg->message}}</td>--}}
                                        {{--<td>{{ date('d-M-Y', strtotime($msg->created_at)) }}</td>--}}
                                        {{--<td><a href="{{route('message.show',$msg->id)}}" class="btn btn-info btn-sm">{{$msg->status}}</a></td>--}}
                                    {{--</tr>--}}
                                {{--@endforeach--}}


                                {{--</tbody>--}}
                            {{--</table>--}}
                            <div class="col-md-10">
                                <label class="col-md-3">Name</label>
                                <label class="col-md-9">{{ $msg->name }}</label>
                            </div>
                            <div class="col-md-10">
                                <label class="col-md-3">Email</label>
                                <label class="col-md-9">{{ $msg->email }}</label>
                            </div>
                            <div class="col-md-10">
                                <label class="col-md-3">Contact</label>
                                <label class="col-md-9">{{ $msg->contact }}</label>
                            </div>
                            <div class="col-md-10">
                                <label class="col-md-3">Message</label>
                                <span class="col-md-9">{{ $msg->message }}</span>
                            </div>
                            <div class="col-md-10">
                                <label class="col-md-3">Created At</label>
                                <label class="col-md-9">{{ date('d-M-Y (H:i:s)', strtotime($msg->created_at)) }}</label>
                            </div>
                        </div>

                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection