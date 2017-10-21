<!DOCTYPE html>
<html>
{{Html::style('assets/plugins/bootstrap/css/bootstrap.css')}}
<style>
    @import url(http://fonts.googleapis.com/css?family=Roboto:400);

    body {
        background-color: #fff;
        -webkit-font-smoothing: antialiased;
        font: normal 14px Roboto, arial, sans-serif;
    }

    .container {
        padding: 50px;
    }

    .form-login {
        background-color: #EDEDED;
        padding-top: 10px;
        padding-bottom: 20px;
        padding-left: 20px;
        padding-right: 20px;
        border-radius: 15px;
        border-color: #d2d2d2;
        border-width: 5px;
        box-shadow: 0 1px 0 #cfcfcf;
    }

    h4 {
        border: 0 solid #fff;
        border-bottom-width: 1px;
        padding-bottom: 10px;
        text-align: center;
    }

    .form-control {
        border-radius: 10px;
    }

    .wrapper {
        text-align: center;
    }

</style>
{!! Html::style('css/parsley.css') !!}
<body>
<!--Pulling Awesome Font -->
<link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">

<div class="container">
    <div class="row">
        {!! Form::open() !!}
        <div class="col-md-offset-4 col-md-4">
            <div class="form-login">
                <h4>Welcome to Login.</h4>
                {{Form::label('email', 'Email:')}}
                {{Form::email('email',null,array('class'=>'form-control input-sm chat-input','required'=>'','maxlength'=>'255','id'=>'idTitle'))}}
                {{Form::label('password', 'Password:')}}
                {{Form::password('password',array('class'=>'form-control input-sm chat-input','required'=>'','minlength'=>'5','maxlength'=>'255','id'=>'idSlug'))}}
                {{Form::checkbox('remember')}}
                {{Form::label('remember', 'Remember:')}}
                <div class="wrapper">
                    <span class="group-btn">
                {{Form::submit('Login',array('class'=>'btn btn-primary btn-md', 'style'=>'margin-top:10px;'))}}
                {{--<a href="#" class="btn btn-primary btn-md">login <i class="fa fa-sign-in"></i></a>--}}
                     </span>
                </div>
                <p>
                    <a href="{{url('password/reset')}}">Forgot Password</a>
                    <a href="{{url('auth/register')}}" class="pull-right">Register</a>
                </p>
            </div>

        </div>
        {!! Form::close() !!}
    </div>
</div>
<script>
    {!! Html::script('js/parsley.min.js') !!}
    {{Html::script('assets/plugins/jquery-2.0.3.min.js')}}
    {{Html::script('assets/plugins/bootstrap/js/bootstrap.min.js')}}
</script>
</body>
</html>


{{--@extends('main')--}}

{{--@section('title','| Login')--}}
{{--@section('stylesheet')--}}
    {{--{!! Html::style('css/parsley.css') !!}--}}
{{--@endsection--}}
{{--@section('content')--}}
    {{--<div class="row">--}}

        {{--<div class="col-md-6 col-md-offset-3">--}}
            {{--<h1>Login</h1>--}}
            {{--{!! Form::open() !!}--}}
            {{--{{Form::label('email', 'Email:')}}--}}
            {{--{{Form::email('email',null,array('class'=>'form-control input-sm chat-input','required'=>'','maxlength'=>'255','id'=>'idTitle'))}}--}}
            {{--{{Form::label('password', 'Password:')}}--}}
            {{--{{Form::password('password',array('class'=>'form-control input-sm chat-input','required'=>'','minlength'=>'5','maxlength'=>'255','id'=>'idSlug'))}}--}}
            {{--{{Form::checkbox('remember')}}--}}
            {{--{{Form::label('remember', 'Remember:')}}--}}

            {{--{{Form::submit('Login',array('class'=>'btn btn-primary btn-md', 'style'=>'margin-top:10px;'))}}--}}
            {{--{!! Form::close() !!}--}}
            {{--<p><a href="{{url('password/reset')}}">Forgot Password</a></p>--}}
        {{--</div>--}}
        {{--<div class="col-md-2">--}}
            {{--<a href="{{url('auth/register')}}">Register</a>--}}
        {{--</div>--}}
    {{--</div>--}}
{{--@endsection--}}
