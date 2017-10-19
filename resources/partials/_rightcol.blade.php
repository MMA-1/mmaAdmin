<div class="thumbnail"> <img src="{{asset('images/templateimages/addsideblock.png')}}" class="img-responsive"> </div>
<?php
$gadgetspost=array();
$popularpost=array();
$blogcontroller=app('App\Http\Controllers\BlogController');
$gadgetspost=$blogcontroller->getSelected(3,null,5);
$popularpost=$blogcontroller->getSelected(null,array(3),5);
?>
<div class="panel">
	<h4>Mobile And Gadgets</h4>
	@foreach($gadgetspost as $post)
		<div class="media">
			<div class="mmasideimgdiv">
				<a href="{{url('/'.$post->slug)}}" >
					@if(isset($post->image))
					<img class="media-object img-responsive" src="{{asset('images/'.$post->image)}}" alt="Science Principle" >
						@else
						<img class="media-object" src="{{asset('images/templateimages/scienceprincipleBanner.png')}}" alt="Science Principle">
					@endif
				</a>
			</div>
			<div class="media-body">
				<a href="{{url('/'.$post->slug)}}">{{$post->title}}</a>
			</div>
		</div>
	@endforeach

</div>

<div class="thumbnail"> <img src="{{asset('images/templateimages/addsideblock.png')}}" class="img-responsive"> </div>
<hr>
<!-- ---------------------------------------- Most Popular ----------------------------------------------------- -->
<div class="panel">
	<h4>Most Viewed</h4>
	@foreach($popularpost as $ppost)
		<div class="media">
			<div class="mmasideimgdiv">
				<a href="{{url('/'.$ppost->slug)}}" >
					@if(isset($ppost->image))
						<img class="media-object img-responsive" src="{{asset('images/'.$ppost->image)}}" alt="Science Principle" >
					@else
						<img class="media-object" src="{{asset('images/templateimages/scienceprincipleBanner.png')}}" alt="Science Principle">
					@endif
				</a>
			</div>
			<div class="media-body">
				<a href="{{url('/'.$ppost->slug)}}">{{$ppost->title}}</a>
			</div>
		</div>
	@endforeach
</div>