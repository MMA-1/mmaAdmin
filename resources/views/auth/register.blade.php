@extends('main')

@section('title','| Register')
@section('stylesheet')
    {!! Html::style('css/parsley.css') !!}
@endsection
@section('content')
    <div class="row">

        <div class="col-md-6 col-md-offset-3">
            <h1>Register</h1>
            {!! Form::open() !!}
            {{csrf_field()}}
            {{Form::label('name', 'Name:')}}
            {{Form::text('name',null,array('class'=>'form-control','required'=>''))}}
            {{Form::label('contact', 'Contact:')}}
            {{Form::text('contact',null,array('class'=>'form-control','maxlength'=>'15'))}}
            {{Form::label('email', 'Email:')}}
            {{Form::email('email',null,array('class'=>'form-control','required'=>''))}}
            {{Form::label('gender', 'Gender:')}}
            {{Form::select('gender', array('Male' => 'Male', 'Female' => 'Female'),null,array('class'=>'form-control'))}}
            {{Form::label('password', 'Password:')}}
            {{Form::password('password',array('class'=>'form-control','required'=>'','minlength'=>'5','maxlength'=>'20'))}}
            {{Form::label('password_confirmation', 'Confirm Password:')}}
            {{Form::password('password_confirmation',array('class'=>'form-control','required'=>'','minlength'=>'5','maxlength'=>'20'))}}

            {{Form::submit('Register',array('class'=>'btn btn-success', 'style'=>'margin-top:10px;'))}}
            {!! Form::close() !!}

        </div>

    </div>
@endsection
