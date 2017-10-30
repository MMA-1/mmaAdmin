@extends('main')

@section('title','| View Posts')

@section('content')
	<div class="inner">
<div class="row">
	<div class="col-md-8">
		@if(isset($media->album->image))
		<img src="{{asset('images/albumsimages/'.$media->album->image)}}" class="img-responsive">
		@endif
		<h3>{{ $media->mediatitle }}</h3>
			<label class="label label-warning">Album</label> <span class="btn btn-danger btn-xs btn-line btn-rect">{{ $media->album->albumtitle }}</span>
			<p ><label class="label label-success">Media Url - </label> &nbsp;<a href="{!! $media->mediaurl !!}">{!! $media->mediaurl !!}</a></p>
			<p >
				<label>Media Type : </label>{!! $media->mediatype->medianame !!}&nbsp;&nbsp;
				<label>Artist : </label>{{$media->artist->artistname}}&nbsp;&nbsp;
				<label>Priority : </label>{{$media->priority}}&nbsp;&nbsp;
				<label>Total Views : </label>{{$media->viewcount}}&nbsp;&nbsp;
			</p>
		<hr>
			<p ><label class="label label-info">Description - </label>{!! $media->description !!}</p>

	</div>
	<div class="col-md-4">
		<div class="well">
			<dl class="dl-horizontal">
				<labe>URL: </labe>
				<p><a href="{{route('shayari.single',$media->slug)}}">{{$media->slug}}</a></p>
			</dl>

			<dl class="dl-horizontal">
				<labe>Category: </labe>
				<p><a href="#">{{$media->album->category->name}}</a></p>
			</dl>
			<dl class="dl-horizontal">
				<labe>Sub Category: </labe>
				<p><a href="#">{{$media->album->subcategory->name}}</a></p>
			</dl>
			<dl class="dl-horizontal">
				<dt>Created At: </dt>
				<dd>{{date('d-M-Y',strtotime($media->created_at))}}</dd>
			</dl>
			<dl class="dl-horizontal">
				<dt>Updated At: </dt>
				<dd>{{date('d-M-Y',strtotime($media->updated_at))}}</dd>
			</dl>
			<hr>
			<div class="row">
				<div class="col-sm-6">
					{!! Html::linkRoute('media.edit','Edit', array($media->id), array('class'=>'btn btn-primary btn-block'))!!}
				</div>
				<div class="col-sm-6">
					<button type="button" class="btn btn-danger btn-block" data-toggle="modal"
							data-target="#deleteModel">DELETE
					</button>


				</div>
			</div>
			<div class="row">
				<div class="col-sm-12">
					{!! Html::linkRoute('media.index','<< See All Media', array(), array('class'=>'btn btn-default btn-block'))!!}
				</div>
			</div>
		</div>
	</div>
</div> 
	</div>
	<!-- Modal -->
	<div class="modal fade" id="deleteModel" role="dialog">
		<div class="modal-dialog">

			<!-- Modal content-->
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal">&times;</button>
					<h4 class="modal-title">Please Confirm !</h4>
				</div>
				<div class="modal-body">
					<p>Do you really want to delete this record?</p>
				</div>
				<div class="modal-footer">
					{!! Form::open(['route'=>['media.destroy',$media->id],'method'=>'DELETE']) !!}
					{!! Form::submit('Delete',['class'=>'btn btn-danger']) !!}
					<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
					{!! Form::close() !!}

				</div>
			</div>

		</div>
	</div>
@endsection