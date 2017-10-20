@extends('main')

@section('title','| View Gallery')

@section('content')
	<div class="inner">
<div class="row">
	<div class="col-md-8">
		@if(isset($gallery->imagepath))
		<img src="{{asset('images/'.$gallery->imagepath)}}" class="img-responsive">
		@endif
		<h3>{{ $gallery->title }}</h3>
		<hr>
		<div class="tags">
			@foreach($gallery->tags as $tag)
			<span class="label label-default">{{$tag->name}}</span>
				@endforeach
		</div>
		<div id="backend-comment" style="margin-top: 50px;">
			<small>{{$gallery->viewcount}} Views</small>
		</div>


	</div>
	<div class="col-md-4">
		<div class="well">
			<dl class="dl-horizontal">
				<labe>URL: </labe>
				<p><a href="{{route('shayari.single',$gallery->slug)}}">{{$gallery->slug}}</a></p>
			</dl>

			<dl class="dl-horizontal">
				<dt>Created At: </dt>
				<dd>{{date('d-M-Y',strtotime($gallery->created_at))}}</dd>
			</dl>
			<dl class="dl-horizontal">
				<dt>Updated At: </dt>
				<dd>{{date('d-M-Y',strtotime($gallery->updated_at))}}</dd>
			</dl>
			<hr>
			<div class="row">
				<div class="col-sm-6">
					{!! Html::linkRoute('gallery.edit','Edit', array($gallery->id), array('class'=>'btn btn-primary btn-block'))!!}
				</div>
				<div class="col-sm-6">

					{!! Form::open(['route'=>['gallery.destroy',$gallery->id],'method'=>'DELETE']) !!}
					{!! Form::submit('Delete',['class'=>'btn btn-danger btn-block']) !!}
					{!! Form::close() !!}

				</div>
			</div>
			<div class="row">
				<div class="col-sm-12">
					{!! Html::linkRoute('gallery.index','<< See All Gallery', array(), array('class'=>'btn btn-default btn-block'))!!}
				</div>
			</div>
		</div>
	</div>
</div> 
	</div>
@endsection