@extends('main')

@section('title','| Create Artist')
@section('stylesheet')
    {!! Html::style('css/parsley.css') !!}
@endsection
@section('content')
    <div class="inner">
        <div class="row">
            <div class="col-lg-12">
                <div class="box dark">
                    <header>
                        <div class="icons"><i class="icon-edit"></i></div>
                        <h5>Create New Post</h5>
                    </header>
                    <div id="div-1" class="accordion-body collapse in body">
                        {!! Form::open(array('route' => 'artists.store','data-parsley-validate'=>'', 'files'=>true,'class' => 'form-horizontal')) !!}
                        <div class="form-group">
                            {{Form::label('artistname', 'Artist Name:',['class'=>'col-lg-3'])}}
                            <div class="col-lg-8">
                                {{Form::text('artistname',null,array('class'=>'form-control','required'=>'','maxlength'=>'255','id'=>'idTitle'))}}
                            </div>
                        </div>
                        <div class="form-group">
                            {{Form::label('slug', 'Slug:',['class'=>'col-lg-3'])}}
                            <div class="col-lg-8">
                                {{Form::text('slug',null,array('class'=>'form-control','required'=>'','minlength'=>'5','maxlength'=>'255','id'=>'idSlug'))}}
                            </div>
                        </div>
                        <div class="form-group">
                            {{Form::label('image','Upload Image:',['class'=>'col-lg-3'])}}
                            <div class="col-lg-8">
                                {{Form::file('image')}}
                            </div>
                        </div>
                        <div class="form-group">
                            {{Form::label('contact', 'Contact Number:',['class'=>'col-lg-3'])}}
                            <div class="col-lg-8">
                                {{Form::text('contact',null,array('class'=>'form-control','maxlength'=>'12'))}}
                            </div>
                        </div>
                        <div class="form-group">
                            {{Form::label('description', 'Description:',['class'=>'col-lg-3'])}}
                            <div class="col-lg-8">
                                {{Form::textarea('description',null,array('class'=>'form-control'))}}
                            </div>
                        </div>
                        <div class="form-group">
                            {{Form::label('priority', 'Priority:',['class'=>'col-lg-3'])}}
                            <div class="col-lg-8">
                                {{Form::number('priority',5,array('class'=>'form-control'))}}
                            </div>
                        </div>
                        <div class="form-group text-center">
                        {{Form::submit('Add Artist',array('class'=>'btn btn-success', 'style'=>'margin-top:10px;'))}}
                        </div>
                        {!! Form::close() !!}


                    </div>
                </div>
            </div>
        </div>


    </div>


@endsection

@section('scripts')
    {!! Html::script('js/parsley.min.js') !!}

    <script type="text/javascript">

        $(document).ready(function () {
            $("#idTitle").keyup(function () {
                $("#idSlug").val(slugify(this.value));
            });
        });
        function slugify(text) {
            return text.toString().toLowerCase()
                .replace(/\s+/g, '-')           // Replace spaces with -
                .replace(/[^\w\-]+/g, '')       // Remove all non-word chars
                .replace(/\-\-+/g, '-')         // Replace multiple - with single -
                .replace(/^-+/, '')             // Trim - from start of text
                .replace(/-+$/, '');            // Trim - from end of text
        }

    </script>

@endsection