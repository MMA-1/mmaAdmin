@extends('main')

@section('title','| View Album')

@section('content')
	<div class="inner">
<div class="row">
	<div class="col-md-8">
		@if(isset($album->image))
		<img src="{{asset('images/albumsimages/'.$album->image)}}" class="img-responsive">
		@endif
		<h3>{{ $album->albumtitle }}</h3>
			<p >
				<label>Year : </label>{!! $album->year !!}&nbsp;&nbsp;
				<label>Status : </label>{{$album->approved ? "Approved":"Blocked"}}&nbsp;&nbsp;
				<label>Priority : </label>{{$album->priority}}&nbsp;&nbsp;
				<label>Total Views : </label>{{$album->viewcount}}&nbsp;&nbsp;
			</p>
<p >{!! $album->description !!}</p>
		<hr>
		<div class="tags">
			@foreach($album->tags as $tag)
			<span class="label label-default">{{$tag->name}}</span>
				@endforeach
		</div>



	</div>
	<div class="col-md-4">
		<div class="well">
			<dl class="dl-horizontal">
				<labe>URL: </labe>
				<p><a href="{{route('albums.show',$album->slug)}}">{{$album->slug}}</a></p>
			</dl>

			<dl class="dl-horizontal">
				<labe>Category: </labe>
				<p><a href="#">{{$album->category->name}}</a></p>
			</dl>
			<dl class="dl-horizontal">
				<labe>Sub Category: </labe>
				<p><a href="#">
						@if($album->subcategory)
						{{$album->subcategory->name}}
						@endif
					</a>
				</p>
			</dl>
			<dl class="dl-horizontal">
				<dt>Created At: </dt>
				<dd>{{date('d-M-Y',strtotime($album->created_at))}}</dd>
			</dl>
			<dl class="dl-horizontal">
				<dt>Updated At: </dt>
				<dd>{{date('d-M-Y',strtotime($album->updated_at))}}</dd>
			</dl>
			<hr>
			<div class="row">
				<div class="col-sm-6">
					{!! Html::linkRoute('albums.edit','Edit', array($album->id), array('class'=>'btn btn-primary btn-block'))!!}
				</div>
				<div class="col-sm-6">

					<button type="button" class="btn btn-danger btn-block" data-toggle="modal"
							data-target="#deleteModel">DELETE
					</button>

				</div>
			</div>
			<div class="row">
				<div class="col-sm-12">
					{!! Html::linkRoute('albums.index','<< See All Albums', array(), array('class'=>'btn btn-default btn-block'))!!}
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
					{!! Form::open(['route'=>['albums.destroy',$album->id],'method'=>'DELETE']) !!}
					{!! Form::submit('Delete',['class'=>'btn btn-danger']) !!}
					<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
					{!! Form::close() !!}

				</div>
			</div>

		</div>
	</div>
@endsection