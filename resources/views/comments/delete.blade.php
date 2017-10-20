@extends('main')

@section('title','| Edit Comment')

@section('content')
    <div class="inner">
    <div class="row">
    <div class="col-md-8 col-md-offset-2">
        <h1>Delete Comment</h1>
        <p>
            <strong>Name : </strong>{{$comment->name}} <br>
            <strong>Email : </strong>{{$comment->email}} <br>
            <strong>Comment : </strong>{{$comment->comment}}
        </p>
    </div>
    </div>
    {{Form::model($comment,['route'=>['comments.destroy',$comment->id],'method'=>'DELETE'])}}

    {{Form::submit('Yes Delete This Comment.',['class'=>'btn btn-block btn-danger','style'=>'margin-top:20px;'])}}
    {{Form::close()}}
    </div>
@endsection