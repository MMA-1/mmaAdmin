@extends('main')

@section('title','| Create New Media')
@section('stylesheet')
    {!! Html::style('css/parsley.css') !!}
    <script src="https://cloud.tinymce.com/stable/tinymce.min.js?apiKey=35dmlnmnknqahkym6zsnyi80y13rnq79i5456gpv8prnyhsi"></script>
    <script>tinymce.init({ selector:'textarea',
            plugins: "link code image textcolor colorpicker image imagetools media table template emoticons",
            toolbar: "forecolor backcolor table template emoticons | bold italic | alignleft aligncenter alignright alignjustify fontsizeselect | bullist numlist outdent indent | link image media",
            templates: [
                {title: 'Some title 1', description: 'Some desc 1', content: '<b>MMA </b> <i>Solutions </i>'},
                {title: 'Some title 2', description: 'Some desc 2', url: 'development.html'}
            ],

        });</script>
@endsection
@section('content')
    <div class="inner">
        <div class="row">
            <div class="col-lg-12">
                <div class="box dark">
                    <header>
                        <div class="icons"><i class="icon-edit"></i></div>
                        <h5>Create New Media</h5>
                    </header>
                    <div id="div-1" class="accordion-body collapse in body">
                        {!! Form::open(array('route' => 'posts.store','data-parsley-validate'=>'', 'files'=>true,'class' => 'form-horizontal')) !!}
                        <div class="form-group">
                            {{Form::label('mediatitle', 'Media Title:',['class'=>'col-lg-3'])}}
                            <div class="col-lg-8">
                                {{Form::text('mediatitle',null,array('class'=>'form-control','required'=>'','maxlength'=>'150','id'=>'idTitle'))}}
                            </div>
                        </div>
                        <div class="form-group">
                            {{Form::label('slug', 'Slug:',['class'=>'col-lg-3'])}}
                            <div class="col-lg-8">
                                {{Form::text('slug',null,array('class'=>'form-control','required'=>'','minlength'=>'5','maxlength'=>'150','id'=>'idSlug'))}}
                            </div>
                        </div>
                        <div class="form-group">
                            {{Form::label('mediaurl', 'Media Url:',['class'=>'col-lg-3'])}}
                            <div class="col-lg-8">
                                {{Form::text('mediaurl',null,array('class'=>'form-control','required'=>'','minlength'=>'5','maxlength'=>'255'))}}
                            </div>
                        </div>
                        <div class="form-group">
                            {{Form::label('mediatype_id','Media Type',['class'=>'col-lg-3'])}}
                            <div class="col-lg-8">
                                {{Form::select('mediatype_id',$mediatypes,null,['class'=>'form-control'])}}
                            </div>
                        </div>
                        <div class="form-group">
                            {{Form::label('artist_id','Artist',['class'=>'col-lg-3'])}}
                            <div class="col-lg-8">
                                {{Form::select('artist_id',$artists,null,['class'=>'form-control'])}}
                            </div>
                        </div>
                        <div class="form-group">
                            {{Form::label('album_id','Album',['class'=>'col-lg-3'])}}
                            <div class="col-lg-8">
                                {{Form::select('album_id',$albums,null,['class'=>'form-control'])}}
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
                                {{Form::text('priority',5,array('class'=>'form-control'))}}
                            </div>
                        </div>
                        <div class="form-group">
                            {{Form::label('metatagvalue', 'Metatag Value:',['class'=>'col-lg-3'])}}
                            <div class="col-lg-8">
                                {{Form::text('metatagvalue',null,array('class'=>'form-control'))}}
                            </div>
                        </div>
                        <div class="form-group">
                            {{Form::label('metatagdescription', 'Metatag Description:',['class'=>'col-lg-3'])}}
                            <div class="col-lg-8">
                                {{Form::text('metatagdescription',null,array('class'=>'form-control'))}}
                            </div>
                        </div>
                        {{Form::submit('Create Media',array('class'=>'btn btn-success', 'style'=>'margin-top:10px;'))}}
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
        $(".select2-multi").select2();
    </script>
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