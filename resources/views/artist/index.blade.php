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
                        List Artists
                    </div>
                    <div class="panel-body">
                        <div class="table-responsive">
		<table class="table table-striped table-bordered table-hover" id="dtArtist">
    <thead>
      <tr>
        <th>#</th>
        <th>Name</th>
        <th>Description</th>
          <th>contact</th>
          <th>Priority</th>
        <th>Created At</th>
        <th>Action</th>
      </tr>
    </thead>
    <tbody>
    	@foreach($mma as $artist)
    	<tr>
        <td>{{ $artist->id }}</td>
        <td>{{ $artist->artistname }}</td>
        <td>{{$artist->description }}</td>
            <td>{{$artist->contact }}</td>
            <td>{{$artist->priority }}</td>
        <td>{{ date('d-M-Y', strtotime($artist->created_at)) }}</td>
        <td>
            <a href="{{route('artists.show',$artist->id)}}" class="btn btn-success btn-sm">View</a>
            <a href="{{route('artists.edit',$artist->id)}}" class="btn btn-danger btn-sm">Edit</a>
        </td>
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
            $('#dtArtist').dataTable();
        });
    </script>
@endsection