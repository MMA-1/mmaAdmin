@extends('main')
@section('title',"| Edit Tag")
@section('content')
    <div class="inner">
        <div class="row">
    <div class="col-md-12">
        <div class="col-md-6 well">
            {!! Form::model($tag,['route'=>['tags.update',$tag->id],'method'=>'PUT']) !!}

            {{Form::label('name','Name :')}}
            {{Form::text('name',null,['class'=>'form-control','id'=>'idName'])}}
            {{Form::label('slug','Slug :')}}
            {{Form::text('slug',null,['class'=>'form-control','id'=>'idSlug'])}}
            <br>
            {{Form::submit('Save Changes', ['class'=>'btn btn-primary btn-block '])}}

            {!! Form::close() !!}
        </div>
    </div>
        </div>
    </div>
@endsection
@section('scripts')
    <script type="text/javascript">

        $(document).ready(function(){
            $("#idName").keyup(function(){
                $("#idSlug").val(slugify(this.value));
            });
        });
        function slugify(text)
        {
            return text.toString().toLowerCase()
                .replace(/\s+/g, '-')           // Replace spaces with -
                .replace(/[^\w\-]+/g, '')       // Remove all non-word chars
                .replace(/\-\-+/g, '-')         // Replace multiple - with single -
                .replace(/^-+/, '')             // Trim - from start of text
                .replace(/-+$/, '');            // Trim - from end of text
        }

    </script>
@endsection