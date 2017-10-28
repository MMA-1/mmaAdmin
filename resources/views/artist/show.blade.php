@extends('main')

@section('title','| View Artist')

@section('content')
    <div class="inner">
        <div class="row">
            <div class="col-md-8">
                @if(isset($artist->image))
                    <img src="{{asset('images/artistsimages/'.$artist->image)}}" class="img-responsive">
                @endif
                <h3>{{ $artist->artistname }}</h3>
                <hr>
                <div class="btn btn-xs btn-info">Priority -{{ $artist->priority }}</div>
                <div id="backend-comment" style="margin-top: 20px;">
                    <label>{{$artist->description}}</label>
                </div>


            </div>
            <div class="col-md-4">
                <div class="well">
                    <dl class="dl-horizontal">
                        <labe>URL:</labe>
                        <p><a href="{{route('shayari.single',$artist->slug)}}">{{$artist->slug}}</a></p>
                    </dl>

                    <dl class="dl-horizontal">
                        <dt>Created At:</dt>
                        <dd>{{date('d-M-Y',strtotime($artist->created_at))}}</dd>
                    </dl>
                    <dl class="dl-horizontal">
                        <dt>Updated At:</dt>
                        <dd>{{date('d-M-Y',strtotime($artist->updated_at))}}</dd>
                    </dl>
                    <hr>
                    <div class="row">
                        <div class="col-sm-6">
                            {!! Html::linkRoute('artists.edit','Edit', array($artist->id), array('class'=>'btn btn-primary btn-block'))!!}
                        </div>
                        <div class="col-sm-6">
                            <button type="button" class="btn btn-danger btn-block" data-toggle="modal"
                                    data-target="#deleteModel">DELETE
                            </button>

                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12">
                            {!! Html::linkRoute('artists.index','<< See All Artists', array(), array('class'=>'btn btn-default btn-block'))!!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal -->
    <div class="modal fade" id="deleteModel" role="dialog">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Please Confirm !</h4>
                </div>
                <div class="modal-body">
                    <p>Do you really want to delete this record?</p>
                </div>
                <div class="modal-footer">
                    {!! Form::open(['route'=>['artists.destroy',$artist->id],'method'=>'DELETE']) !!}
                    {!! Form::submit('Delete',['class'=>'btn btn-danger']) !!}
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    {!! Form::close() !!}

                </div>
            </div>

        </div>
    </div>

@endsection