@extends('main')

@section('title','| Create Fateha And News')
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
        {{--<div class="row">--}}
            {{--<div class="col-lg-12">--}}
                {{--<h3>Advance Form Elements</h3>--}}
            {{--</div>--}}
        {{--</div>--}}
        <div class="row">
            <div class="col-lg-12">
                <div class="box dark">
                    <header>
                        <div class="icons"><i class="icon-edit"></i></div>
                        <h5>Create Fateha And News</h5>
                    </header>
                    <div id="div-1" class="accordion-body collapse in body">
                        {!! Form::open(array('route' => 'fateha.store','data-parsley-validate'=>'', 'files'=>true,'class' => 'form-horizontal')) !!}
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

                        {{Form::submit('Create News',array('class'=>'btn btn-success', 'style'=>'margin-top:10px;'))}}
                        {!! Form::close() !!}


                    </div>
                </div>
            </div>
        </div>


        <div class="row">
            <div class="col-md-12">
                <h4> META TAGS HINTS</h4> <br>
                <u>GoogleAds Hint -></u>&nbsp;&nbsp;&nbsp;&nbsp;
                <br>
                <u>Default -></u>&nbsp;&nbsp;Latest Science News, Tech News, Physics News, Nasa News, Tricks And Hacks, Science Theory and Facts
            </div>
        </div>
    </div>


@endsection

@section('scripts')
    {!! Html::script('js/parsley.min.js') !!}

@endsection