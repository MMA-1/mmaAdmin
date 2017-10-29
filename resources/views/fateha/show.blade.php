@extends('main')

@section('title','| View Album')

@section('content')
	<div class="inner">
<div class="row">
	<div class="col-md-8">
		<h3>{{ $fateha->message }}</h3>
			<p >
				<label>Expiration of message : </label>{!! $fateha->expiration !!}&nbsp;
				<label>Created At : </label>{{$fateha->created_at}}&nbsp;&nbsp;
				<label>Priority : </label>{{$fateha->priority}}&nbsp;&nbsp;
			</p>
<p >{!! $fateha->description !!}</p>
		<hr>
	</div>
	<div class="col-md-4">
		<div class="well">
			<dl class="dl-horizontal">
				<dt>Added By: </dt>
				<dd>{{$fateha->addedby}}</dd>
			</dl>
			<dl class="dl-horizontal">
				<dt>Updated By: </dt>
				<dd>{{$fateha->updatedby}}</dd>
			</dl>
			<dl class="dl-horizontal">
				<dt>Created At: </dt>
				<dd>{{date('d-M-Y',strtotime($fateha->created_at))}}</dd>
			</dl>
			<dl class="dl-horizontal">
				<dt>Updated At: </dt>
				<dd>{{date('d-M-Y',strtotime($fateha->updated_at))}}</dd>
			</dl>
			<hr>
			<div class="row">
				<div class="col-sm-6">
					{!! Html::linkRoute('fateha.edit','Edit', array($fateha->id), array('class'=>'btn btn-primary btn-block'))!!}
				</div>
				<div class="col-sm-6">

					<button type="button" class="btn btn-danger btn-block" data-toggle="modal"
							data-target="#deleteModel">DELETE
					</button>

				</div>
			</div>
			<div class="row">
				<div class="col-sm-12">
					{!! Html::linkRoute('fateha.index','<< See All Fateha and News', array(), array('class'=>'btn btn-default btn-block'))!!}
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
					{!! Form::open(['route'=>['fateha.destroy',$fateha->id],'method'=>'DELETE']) !!}
					{!! Form::submit('Delete',['class'=>'btn btn-danger']) !!}
					<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
					{!! Form::close() !!}

				</div>
			</div>

		</div>
	</div>
@endsection