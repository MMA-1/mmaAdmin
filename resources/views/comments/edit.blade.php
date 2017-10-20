@extends('main')

@section('title','| Edit Comment')

@section('content')
    <div class="inner">
        <div class="row">
            <div class="col-lg-12">
    <h1>Edit Comment</h1>
    {{Form::model($comment,['route'=>['comments.update',$comment->id],'method'=>'PUT'])}}
    {{Form::label('name','Name :')}}
    {{Form::text('name',null,['class'=>'form-control','disabled'=>''])}}
    {{Form::label('email','Email :')}}
    {{Form::text('email',null,['class'=>'form-control','disabled'=>''])}}
    {{Form::label('comment','Comment :')}}
    {{Form::textarea('comment',null,['class'=>'form-control'])}}
    {{Form::label('approved', 'Approval:')}}
    {{Form::select('approved', array('true' => 'Approved', 'false' => 'Block'),null,array('class'=>'form-control'))}}
    {{Form::submit('Save Changes',['class'=>'btn btn-block btn-success','style'=>'margin-top:20px;'])}}
    {{Form::close()}}
            </div>
        </div>
    </div>
@endsection