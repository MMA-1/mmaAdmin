@extends('main')

@section('title','| Edit Posts')
@section('stylesheet')
    {!! Html::style('css/parsley.css') !!}
    {!! Html::style('assets/plugins/chosen/chosen.min.css') !!}
    <style>
        .chosen-container-single .chosen-single {
            padding: 2px 0 0 10px;
            height: 30px;
        }
        .chosen-container{
            font-size: inherit;
        }
    </style>
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
                    <h5>Edit Media</h5>
                </header>
    <div id="div-1" class="accordion-body collapse in body">
        {!! Form::model($media,['route'=>['media.update',$media->id],'method'=>'PUT','class' => 'form-horizontal'])!!}

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
                {{Form::select('artist_id',$artists,null,['class'=>'form-control chzn-select','tabindex'=>'2','data-placeholder'=>'Select Artist'])}}
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
            <div class="form-group">
                <div class="col-md-12">
                    <div class="well text-center">
                            <label class="btn btn-success btn-flat btn-rect">Created At:</label>
                            <label class="btn btn-success btn-line btn-rect">{{date('d-M-Y',strtotime($media->created_at))}}</label>

                            <label class="btn btn-primary btn-flat btn-rect">Updated At:</label>
                            <label class="btn btn-primary btn-line btn-rect">{{date('d-M-Y',strtotime($media->updated_at))}}</label>


                        <hr>
                        <div class="row">
                                {!! Html::linkRoute('media.show','Cancel', array($media->id), array('class'=>'btn btn-primary btn-md'))!!}

                                {{Form::submit('Save Changes',array('class'=>'btn btn-success btn-md'))}}

                        </div>
                    </div>
                </div>
            </div>
        {!! Form::close()!!}
    </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <h4> META TAGS HINTS</h4> <br>
            <u>GoogleAds Hint -></u>&nbsp;&nbsp;&nbsp;&nbsp;
            <br>
            <u>Default -></u>&nbsp;&nbsp;
        </div>
    </div>
    </div>
@endsection
@section('scripts')
    {!! Html::script('js/parsley.min.js') !!}
    {!! Html::script('assets/plugins/inputlimiter/jquery.inputlimiter.1.3.1.min.js') !!}
    {!! Html::script('assets/plugins/chosen/chosen.jquery.min.js') !!}
    {!! Html::script('assets/plugins/tagsinput/jquery.tagsinput.min.js') !!}
    {!! Html::script('assets/plugins/autosize/jquery.autosize.min.js') !!}
    <script>
        $(".chzn-select").chosen();
        $(".chzn-select-deselect").chosen({
            allow_single_deselect: true
        });
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