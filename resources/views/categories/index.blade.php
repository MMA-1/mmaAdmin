@extends('main')
@section('title', '| Categories')
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
                </tr>
                </thead>
                <tbody>
                @foreach($categories as $category)
                    <tr>
                        <td>{{ $category->id }}</td>
                        <td>{{ $category->name }}</td>
                        <td>{{ $category->category_slug }}</td>
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
                {!! Form::open(['route'=>'categories.store','method'=>'POST']) !!}
                <h2>New Category</h2>
                {{Form::label('name','Name :')}}
                {{Form::text('name',null,['class'=>'form-control','id'=>'idName'])}}
                {{Form::label('category_slug','Slug :')}}
                {{Form::text('category_slug',null,['class'=>'form-control','id'=>'idSlug'])}}
                <br>
                {{Form::submit('Create New Category', ['class'=>'btn btn-primary btn-block '])}}

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