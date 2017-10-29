@extends('main')
@section('title', '| All Albums')
@section('stylesheet')
    {!! Html::style('assets/plugins/dataTables/dataTables.bootstrap.css') !!}
@endsection
@section('content')
    <div class="inner">
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    List Fateha And News
                </div>
                <div class="panel-body">
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered table-hover" id="dtPosts">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Message</th>
                                <th>expiration</th>
                                <th>priority</th>
                                <th>Created At</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($fateha as $ft)
                                <tr>
                                    <td>{{ $ft->id }}</td>
                                    <td>{{ $ft->message }}</td>
                                    <td>{{ $ft->expiration }}</td>
                                    <td>{{ $ft->priority }}</td>
                                    <td>{{ date('d-M-Y', strtotime($ft->created_at)) }}</td>
                                    <td><a href="{{route('fateha.show',$ft->id)}}" class="btn btn-success btn-sm">View</a><a
                                                href="{{route('fateha.edit',$ft->id)}}" class="btn btn-danger btn-sm">Edit</a></td>
                                </tr>
                            @endforeach


                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
        </div>






        {{--<div class="text-center">--}}
            {{--{!! $posts->links(); !!}--}}
        {{--</div>--}}
    </div>
    </div>
@endsection
@section('scripts')
    {!! Html::script('assets/plugins/dataTables/jquery.dataTables.js') !!}
    {!! Html::script('assets/plugins/dataTables/dataTables.bootstrap.js') !!}
    <script>
        $(document).ready(function () {
            $('#dtPosts').dataTable();
        });
    </script>
@endsection
