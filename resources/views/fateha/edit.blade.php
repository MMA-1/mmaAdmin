@extends('main')

@section('title','| Edit Fateha And News')
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
                    <h5>Edit Album</h5>
                </header>
    <div id="div-1" class="accordion-body collapse in body">
        {!! Form::model($fateha,['route'=>['fateha.update',$fateha->id],'method'=>'PUT', 'files'=>true,'class' => 'form-horizontal'])!!}

        <div class="form-group">
            {{Form::label('message', 'Message:',['class'=>'col-lg-3'])}}
            <div class="col-lg-8">
                {{Form::text('message',null,array('class'=>'form-control','required'=>'','maxlength'=>'255','id'=>'idTitle'))}}
            </div>
        </div>
        <div class="form-group">
            {{Form::label('expiration', 'Expiration:',['class'=>'col-lg-3'])}}
            <div class="col-lg-8">
                {{Form::date('expiration',null,array('class'=>'form-control','required'=>'','maxlength'=>'255'))}}
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
                <div class="col-md-12">
                    <div class="well text-center">
                            <label class="btn btn-success btn-flat btn-rect">Created At:</label>
                            <label class="btn btn-success btn-line btn-rect">{{date('d-M-Y',strtotime($fateha->created_at))}}</label>

                            <label class="btn btn-primary btn-flat btn-rect">Updated At:</label>
                            <label class="btn btn-primary btn-line btn-rect">{{date('d-M-Y',strtotime($fateha->updated_at))}}</label>


                        <hr>
                        <div class="row">
                                {!! Html::linkRoute('fateha.show','Cancel', array($fateha->id), array('class'=>'btn btn-primary btn-md'))!!}

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

    </div>
@endsection
@section('scripts')
    {!! Html::script('js/parsley.min.js') !!}


@endsection