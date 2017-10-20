@extends('main')

@section('title','| Edit Posts')
@section('stylesheet')
    {!! Html::style('css/parsley.css') !!}
    {!! Html::style('css/select2.min.css') !!}

@endsection
@section('content')
    <div class="inner">
        <div class="row">
            <div class="col-md-12">
             <div class="box dark">
                <header>
                    <div class="icons"><i class="icon-edit"></i></div>
                    <h5>Edit Gallery</h5>
                </header>
                <div id="div-1" class="accordion-body collapse in body">
                    {!! Form::model($gallery,['route'=>['gallery.update',$gallery->id],'method'=>'PUT', 'files'=>true,'class' => 'form-horizontal'])!!}
                    <div class="form-group">
                        {{Form::label('title', 'Title:',['class'=>'col-lg-3'])}}
                    <div class="col-lg-8">
                        {{Form::text('title',null,array('class'=>'form-control','required'=>'','maxlength'=>'255'))}}
                    </div>
                    </div>
                    <div class="form-group">
                        {{Form::label('slug', 'Slug:',['class'=>'col-lg-3'])}}
                    <div class="col-lg-8">
                        {{Form::text('slug',null,array('class'=>'form-control','required'=>'','minlength'=>'5','maxlength'=>'255'))}}
                    </div>
                    </div>
                    <div class="form-group">
                        {{Form::label('tags','Tags:',['class'=>'col-lg-3'])}}
                    <div class="col-lg-8">
                        {{Form::select('tags[]',$tags,null,['class'=>'form-control select2-multi','multiple'=>'multiple'])}}
                    </div>
                    </div>
                    <div class="form-group">
                        {{Form::label('featured_image','Upload Featured Image:',['class'=>'col-lg-3'])}}
                    <div class="col-lg-8">
                        {{Form::file('featured_image')}}
                    </div>
                    </div>
                    <div class="form-group">
                        {{Form::label('priority', 'Priority:',['class'=>'col-lg-3'])}}
                    <div class="col-lg-8">
                        {{Form::text('priority',null,array('class'=>'form-control'))}}
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
                        {{Form::label('approved', 'Approval:',['class'=>'col-lg-3'])}}
                    <div class="col-lg-8">
                        {{Form::select('approved', array('1' => 'Approved', '0' => 'Block'),null,array('class'=>'form-control'))}}
                    </div>
                    </div>

                    <div class="form-group">
                        <div class="col-md-6">
                        <div class="well">
                            <dl class="dl-horizontal">
                                <dt>Created At:</dt>
                                <dd>{{date('d-M-Y',strtotime($gallery->created_at))}}</dd>
                            </dl>
                            <dl class="dl-horizontal">
                                <dt>Updated At:</dt>
                                <dd>{{date('d-M-Y',strtotime($gallery->updated_at))}}</dd>
                            </dl>
                            <hr>
                            <div class="row">
                                <div class="col-sm-6">
                                    {!! Html::linkRoute('gallery.show','Cancel', array($gallery->id), array('class'=>'btn btn-primary btn-block'))!!}
                                </div>
                                <div class="col-sm-6">
                                    {{Form::submit('Save Changes',array('class'=>'btn btn-success btn-block'))}}

                                </div>
                            </div>
                        </div>
                        </div>
                        <div class="col-md-6">
                            @if(isset($gallery->imagepath))
                                <img src="{{asset('images/'.$gallery->imagepath)}}" class="img-responsive">
                            @endif
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
            {!! Html::script('js/select2.min.js') !!}
            <script type="text/javascript">
                $(".select2-multi").select2();
            </script>

@endsection