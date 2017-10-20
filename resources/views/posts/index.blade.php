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
                                <th>Title</th>
                                <th>Ctgry</th>
                                <th>Tags</th>
                                <th>Status</th>
                                <th>Created At</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($posts as $post)
                                <tr>
                                    <td>{{ $post->id }}</td>
                                    <td>{{ $post->title }}</td>
                                    <td>{{$post->category->name }}</td>
                                    <td>
                                        @foreach($post->tags as $tag)
                                            <span class="label label-default">{{$tag->name}}</span>
                                        @endforeach
                                    </td>
                                    <td>{{$post->approved ? "Approved":"Blocked"}}</td>
                                    <td>{{ date('d-M-Y', strtotime($post->created_at)) }}</td>
                                    <td><a href="{{route('posts.show',$post->id)}}" class="btn btn-success btn-sm">View</a><a
                                                href="{{route('posts.edit',$post->id)}}" class="btn btn-danger btn-sm">Edit</a></td>
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
