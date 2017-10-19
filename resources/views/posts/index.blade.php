@extends('main')
@section('title', '| All Posts')
@section('content')
<div class="row">
	<div class="col-md-10">
		<h1>All Posts</h1>

	</div>
	<div class="col-md-2">
		<a href="{{route('posts.create')}}" class="btn btn-lg btn-block btn-primary btn-h1-spaing">Create New Post</a>
	</div>
	<hr>
</div>
<div class="row">
    <div class="col-md-12">
        {!! Form::open(array('route' => 'posts.filter','method'=>'POST')) !!}
        <div class="col-md-1">
            {{Form::label('category_id','Category')}}
        </div>
        <div class="col-md-3">
        {{Form::select('category_id',$categories,null,['class'=>'form-control'])}}
        </div>
        <div class="col-md-1">
            {{Form::label('searchsrting','String')}}
        </div>
        <div class="col-md-3">
            {{Form::text('searchsrting',null,['class'=>'form-control'])}}
        </div>
        <div class="col-lg-3">
            {{Form::submit('Search',array('class'=>'btn btn-success'))}}
        </div>
        {!! Form::close() !!}
    </div>
	<div class="col-md-12">
		<table class="table">
    <thead>
      <tr>
        <th>#</th>
        <th>Title</th>
        <th>Shayar</th>
          <th>Tags</th>
          <th>Status</th>
        <th>Created At</th>
        <th>View</th>
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
        <td><a href="{{route('posts.show',$post->id)}}" class="btn btn-success btn-sm">View</a><a href="{{route('posts.edit',$post->id)}}" class="btn btn-danger btn-sm">Edit</a></td>
      </tr>
    	@endforeach
      
      
    </tbody>
  </table>
        <div class="text-center">
            {!! $posts->links(); !!}
        </div>
	</div>
</div>
@stop