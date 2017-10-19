<div class="col-md-3">
	<div class="list-group">
		<a href="#" class="list-group-item active">Popular Shayars</a>
		@foreach($categories as $category)
		<div class="list-group-item">
			{{--<span class="badge"></span>--}}
			 <a href="{{url('shayar/'.$category->category_slug)}}">{{$category->name}}</a>
		</div>
		@endforeach
		<a href="#" class="list-group-item active">See All...</a>
	</div>
	{{--<img alt="Bootstrap Image Preview" src="images/sidevertical.png" class="img-thumbnail">--}}
	<a href="https://www.crazydomains.in?affiliate=YTozOntzOjE5OiJhZmZpbGlhdGVfYmFubmVyX2lkIjtzOjQ6IjE3NDgiO3M6MTA6InJlbG9hZF91cmwiO3M6Mjc6Imh0dHBzOi8vd3d3LmNyYXp5ZG9tYWlucy5pbiI7czo5OiJtZW1iZXJfaWQiO3M6NzoiODE0OTA0MiI7fQ=="><img src="https://www.crazydomains.in/images/affiliates/2015/120x600/unlimited_web_hosting_in.png" /></a>
</div>