@extends('main')

@section('title','| Login')
@section('stylesheet')
    {!! Html::style('css/parsley.css') !!}
@endsection
@section('content')
    <div class="row">

        <div class="col-md-6 col-md-offset-3">
            <h1>Login</h1>
            {!! Form::open() !!}
            {{Form::label('email', 'Email:')}}
            {{Form::email('email',null,array('class'=>'form-control','required'=>'','maxlength'=>'255','id'=>'idTitle'))}}
            {{Form::label('password', 'Password:')}}
            {{Form::password('password',array('class'=>'form-control','required'=>'','minlength'=>'5','maxlength'=>'255','id'=>'idSlug'))}}
            {{Form::checkbox('remember')}}
            {{Form::label('remember', 'Remember:')}}

            {{Form::submit('Login',array('class'=>'btn btn-success', 'style'=>'margin-top:10px;'))}}
            {!! Form::close() !!}
            <p><a href="{{url('password/reset')}}">Forgot Password</a></p>
        </div>
        <div class="col-md-2">
<a href="{{url('auth/register')}}">Register</a>
        </div>
    </div>
@endsection
