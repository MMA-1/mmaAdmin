@extends('main')
@section('title', '| Tags')
@section('content')
    <div class="inner">
    <div class="row">
        <div class="col-md-8">
            <table class="table">
                <thead>
                <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>Slug</th>
                    <th></th>
                </tr>
                </thead>
                <tbody>
                @foreach($tags as $tag)
                    <tr>
                        <td>{{ $tag->id }}</td>
                        <td>{{ $tag->name }}</td>
                        <td>{{ $tag->slug }}</td>
                        <td><a href="{{route('tags.show',$tag->id)}}" class="btn btn-primary btn-xs">View</a></td>
                        {{--<td>{{substr($post->body,0,50)  }}{{ strlen($post->body) > 50 ? "...":"" }}</td>--}}
                        {{--<td>{{ date('d-M-Y', strtotime($post->created_at)) }}</td>--}}
                        {{--<td><a href="{{route('posts.show',$post->id)}}" class="btn btn-success btn-sm">View</a><a href="{{route('posts.edit',$post->id)}}" class="btn btn-danger btn-sm">Edit</a></td>--}}
                    </tr>
                @endforeach


                </tbody>
            </table>

        </div>
        <div class="col-md-3">
            <div class="well">
                {!! Form::open(['route'=>'tags.store','method'=>'POST']) !!}
                <h2>New Tag</h2>
                {{Form::label('name','Name :')}}
                {{Form::text('name',null,['class'=>'form-control','id'=>'idName'])}}
                {{Form::label('slug','Slug :')}}
                {{Form::text('slug',null,['class'=>'form-control','id'=>'idSlug'])}}
                <br>
                {{Form::submit('Create New Tag', ['class'=>'btn btn-primary btn-block '])}}

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
