@extends('main')

@section('title','| View Posts')

@section('content')
<div class="row">
	<div class="col-md-8">
		@if(isset($post->image))
		<img src="{{asset('images/'.$post->image)}}" class="img-responsive">
		@endif
		<h3>{{ $post->title }}</h3>
<p >{!! $post->body !!}</p>
		<hr>
		<div class="tags">
			@foreach($post->tags as $tag)
			<span class="label label-default">{{$tag->name}}</span>
				@endforeach
		</div>
		<div id="backend-comment" style="margin-top: 50px;">
			<h3>Comments <small>{{$post->comments()->count()}} total</small></h3>
			<table class="table table-bordered">
				<thead>
				<tr>
					<th>Name</th>
					<th>Email</th>
					<th>Comment</th>
					<th width="70px"></th>
				</tr>
				</thead>
				<tbody>
				@foreach($post->comments as $comment)
				<tr>
					<td>{{$comment->name}}</td>
					<td>{{$comment->email}}</td>
					<td>{{$comment->comment}}</td>
					<td><a href="{{route('comments.edit',$comment->id)}}" class="btn btn-xs btn-primary"><span class="glyphicon glyphicon-pencil"></span></a>
						<a href="{{route('comments.delete',$comment->id)}}" class="btn btn-xs btn-danger"><span class="glyphicon glyphicon-trash"></span></a>
					</td>
				</tr>
					@endforeach
				</tbody>
			</table>
		</div>


	</div>
	<div class="col-md-4">
		<div class="well">
			<dl class="dl-horizontal">
				<labe>URL: </labe>
				<p><a href="{{route('shayari.single',$post->slug)}}">{{$post->slug}}</a></p>
			</dl>

			<dl class="dl-horizontal">
				<labe>Category: </labe>
				<p><a href="#">{{$post->category->name}}</a></p>
			</dl><dl class="dl-horizontal">
				<dt>Created At: </dt>
				<dd>{{date('d-M-Y',strtotime($post->created_at))}}</dd>
			</dl>
			<dl class="dl-horizontal">
				<dt>Updated At: </dt>
				<dd>{{date('d-M-Y',strtotime($post->updated_at))}}</dd>
			</dl>
			<hr>
			<div class="row">
				<div class="col-sm-6">
					{!! Html::linkRoute('posts.edit','Edit', array($post->id), array('class'=>'btn btn-primary btn-block'))!!}
				</div>
				<div class="col-sm-6">

					{!! Form::open(['route'=>['posts.destroy',$post->id],'method'=>'DELETE']) !!}
					{!! Form::submit('Delete',['class'=>'btn btn-danger btn-block']) !!}
					{!! Form::close() !!}

				</div>
			</div>
			<div class="row">
				<div class="col-sm-12">
					{!! Html::linkRoute('posts.index','<< See All Posts', array(), array('class'=>'btn btn-default btn-block'))!!}
				</div>
			</div>
		</div>
	</div>
</div> 

@endsection