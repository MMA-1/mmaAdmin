@extends('main')
@section('title', '| All Gallery')
@section('stylesheet')
    {!! Html::style('assets/plugins/dataTables/dataTables.bootstrap.css') !!}
@endsection
@section('content')
    <div class="inner">
        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        List Gallery
                    </div>
                    <div class="panel-body">
                        <div class="table-responsive">
		<table class="table table-striped table-bordered table-hover" id="dtGallery">
    <thead>
      <tr>
        <th>#</th>
        <th>Title</th>
        <th>URL</th>
          <th>Tags</th>
          <th>Status</th>
        <th>Created At</th>
        <th>Action</th>
      </tr>
    </thead>
    <tbody>
    	@foreach($photogallery as $gallery)
    	<tr>
        <td>{{ $gallery->id }}</td>
        <td>{{ $gallery->title }}</td>
        <td>{{asset('images/'.$gallery->imagepath) }}</td>
            <td>
                @foreach($gallery->tags as $tag)
                    <span class="label label-default">{{$tag->name}}</span>
                    @endforeach
            </td>
            <td>{{$gallery->approved ? "Approved":"Blocked"}}</td>
        <td>{{ date('d-M-Y', strtotime($gallery->created_at)) }}</td>
        <td><a href="{{route('gallery.show',$gallery->id)}}" class="btn btn-success btn-sm">View</a><a href="{{route('gallery.edit',$gallery->id)}}" class="btn btn-danger btn-sm">Edit</a></td>
      </tr>
    	@endforeach
      
      
    </tbody>
  </table>
        {{--<div class="text-center">--}}
            {{--{!! $photogallery->links(); !!}--}}
        {{--</div>--}}
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
            $('#dtGallery').dataTable();
        });
    </script>
@endsection