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
                        List Albums
                    </div>
                    <div class="panel-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered table-hover" id="dtPosts">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Album Title</th>
                                    <th>Year</th>
                                    <th>Ctgry</th>
                                    <th>Sub Ctgry</th>
                                    <th>Priority</th>
                                    <th>Status</th>
                                    <th>Created At</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($albums as $album)
                                    <tr>
                                        <td>{{ $album->id }}</td>
                                        <td>{{ $album->albumtitle }}</td>
                                        <td>{{ $album->year }}</td>
                                        <td>{{ $album->category->name }}</td>
                                        <td>@if($album->subcategory)
                                                {{ $album->subcategory->name }}
                                                @endif
                                        </td>
                                        <td>{{ $album->priority }}</td>
                                        <td>{{$album->approved ? "Approved":"Blocked"}}</td>
                                        <td>{{ date('d-M-Y', strtotime($album->created_at)) }}</td>
                                        <td><a href="{{route('albums.show',$album->id)}}"
                                               class="btn btn-success btn-sm">View</a><a
                                                    href="{{route('albums.edit',$album->id)}}"
                                                    class="btn btn-danger btn-sm">Edit</a></td>
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
