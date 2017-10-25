@extends('main')

@section('title','| Create New Post')
@section('stylesheet')
    {!! Html::style('css/parsley.css') !!}
    {!! Html::style('css/select2.min.css') !!}
@endsection
@section('content')
    <div class="inner">
        <div class="row">
            <div class="col-lg-12">
                <div class="box dark">
                    <header>
                        <div class="icons"><i class="icon-edit"></i></div>
                        <h5>Media Types</h5>
                    </header>
                    <div id="div-1" class="accordion-body collapse in body">
                        {!! Form::open(array('route' => 'mediatypes.store','data-parsley-validate'=>'','class' => 'form-horizontal')) !!}
                        <div class="form-group">
                            {{Form::label('medianame', 'Media Type Name:',['class'=>'col-lg-2'])}}
                            <div class="col-lg-5">
                                {{Form::text('medianame',null,array('class'=>'form-control','required'=>'','maxlength'=>'255','id'=>'idMediaType'))}}
                            </div>
                        </div>
                        <div class="form-group">
                            {{Form::label('slug', 'Slug:',['class'=>'col-lg-2'])}}
                            <div class="col-lg-5">
                                {{Form::text('slug',null,array('class'=>'form-control','required'=>'','minlength'=>'5','maxlength'=>'255','id'=>'idSlug'))}}
                            </div>
                        </div>
                        {{Form::submit('Create Media Type',array('class'=>'btn btn-success', 'style'=>'margin:10px 0 0 20px;'))}}
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>


        <div class="row">
            <div class="col-md-12">
                <table class="table table-striped table-bordered table-hover" id="dtmedianame">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>Media Type Name</th>
                        <th>Slug</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($mma as $mediatype)
                        <tr>
                            <td>{{ $mediatype->id }}</td>
                            <td>{{ $mediatype->medianame }}</td>
                            <td>{{$mediatype->slug }}</td>

                        </tr>
                    @endforeach


                    </tbody>
                </table>
            </div>
        </div>
    </div>


@endsection

@section('scripts')
    {!! Html::script('js/parsley.min.js') !!}

    <script type="text/javascript">

        $(document).ready(function () {
            $("#idMediaType").keyup(function () {
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