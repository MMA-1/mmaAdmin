<div id="left">
	<div class="media user-media well-small"> <a class="user-link" href="#"> <img class="media-object img-thumbnail img-responsive user-img" alt="User Picture" src="{{asset('assets/img/mma64x48.png')}}" /> </a> <br />
		<div class="media-body">
			<h5 class="media-heading"> Mazhar</h5>
			<ul class="list-unstyled user-info">
				<li> <a class="btn btn-success btn-xs btn-circle" style="width: 10px;height: 12px;"></a> {{Auth::check()? "Logged In":"Logged Out"}} </li>
			</ul>
		</div>
		<br />
	</div>
	<ul id="menu" class="collapse">
		@if(Auth::check())
		<li class="panel"> <a href="index.html" > <i class="icon-table"></i> Dashboard </a> </li>
		<li class="panel active"> <a href="#" data-parent="#menu" data-toggle="collapse" class="accordion-toggle" data-target="#idpost"> <i class="icon-columns"></i> Posts <span class="pull-right"> <i class="icon-angle-left"></i> </span> &nbsp; <span class="label label-success">5</span>&nbsp; </a>
			<ul class="collapse" id="idpost">
				<li class=""><a href="{{route('posts.create')}}"><i class="icon-angle-right"></i>Create Post</a></li>
				<li class=""><a href="{{route('posts.index')}}"><i class="icon-angle-right"></i>List Post</a></li>
			</ul>
		</li>
		<li class="panel"> <a href="#" data-parent="#menu" data-toggle="collapse" class="accordion-toggle" data-target="#idcategory"> <i class="icon-sitemap"></i> Categories <span class="pull-right"> <i class="icon-angle-left"></i> </span> &nbsp; <span class="label label-success">7</span>&nbsp; </a>
			<ul class="collapse" id="idcategory">
				<li class=""><a href="{{route('categories.index')}}"><i class="icon-angle-right"></i>Categories</a></li>
				<li class=""><a href="{{route('subcategories.index')}}"><i class="icon-angle-right"></i>Sub Categories</a></li>
				<li class=""><a href="{{route('tags.index')}}"><i class="icon-angle-right"></i>Tags</a></li>
			</ul>
		</li>
		<li class="panel"> <a href="#" data-parent="#menu" data-toggle="collapse" class="accordion-toggle" data-target="#idgallery"> <i class="icon-film"></i> Gallery <span class="pull-right"> <i class="icon-angle-left"></i> </span> &nbsp; <span class="label label-success">5</span>&nbsp; </a>
			<ul class="collapse" id="idgallery">
				<li class=""><a href="{{route('gallery.create')}}"><i class="icon-angle-right"></i>Create Photo Gallery</a></li>
				<li class=""><a href="{{route('gallery.index')}}"><i class="icon-angle-right"></i>List Photo Gallery</a></li>
			</ul>
		</li>

			<li><a href="{{route('logout')}}">Logout</a></li>
		@else
			<a href="{{route('login')}}" class="btn btn-success pull-right">Login</a></li>
		@endif
	</ul>
</div>
