@extends('main')
@section('title', '| All Posts')
@section('stylesheet')
    {!! Html::style('assets/plugins/dataTables/dataTables.bootstrap.css') !!}
@endsection
@section('content')
    <div class="inner">
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    List Posts
                </div>
                <div class="panel-body">
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered table-hover" id="dtPosts">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Media Title</th>
                                <th>Album</th>
                                <th>Media Type</th>
                                <th>Description</th>
                                <th>Category</th>
                                <th>Priority</th>
                                <th>Created On</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($media as $mda)
                                <tr>
                                    <td>{{ $mda->id }}</td>
                                    <td>{{ $mda->mediatitle }}</td>
                                    <td>{{ $mda->album->albumtitle }}</td>
                                    <td>{{ $mda->mediatype->medianame }}</td>
                                    <td>{{substr(strip_tags($mda->description),0,50)}}</td>
                                    <td>{{ $mda->album->category->name }}</td>
                                    <td>{{ $mda->priority }}</td>
                                    <td>{{ date('d-M-Y', strtotime($mda->created_at)) }}</td>
                                    <td><a href="{{route('media.show',$mda->id)}}" class="btn btn-success btn-sm">View</a><a
                                                href="{{route('media.edit',$mda->id)}}" class="btn btn-danger btn-sm">Edit</a></td>
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
