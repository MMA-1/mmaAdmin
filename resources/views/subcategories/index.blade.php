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
                    <th>Category</th>
                </tr>
                </thead>
                <tbody>
                @foreach($subcategories as $subcategory)
                    <tr>
                        <td>{{ $subcategory->id }}</td>
                        <td>{{ $subcategory->name }}</td>
                        <td>{{ $subcategory->subcategory_slug }}</td>
                        <td>{{ $subcategory->category->name }}</td>
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
                {!! Form::open(['route'=>'subcategories.store','method'=>'POST']) !!}
                <h3>New Sub Category</h3>
                {{Form::label('category_id','Category :')}}
                {{Form::select('category_id',$categories,null,['class'=>'form-control','required'=>''])}}
                {{Form::label('name','Name :')}}
                {{Form::text('name',null,['class'=>'form-control','id'=>'idName','required'=>''])}}
                {{Form::label('subcategory_slug','Slug :')}}
                {{Form::text('subcategory_slug',null,['class'=>'form-control','id'=>'idSlug','required'=>''])}}
                <br>
                {{Form::submit('Create New SubCategory', ['class'=>'btn btn-primary btn-block '])}}

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