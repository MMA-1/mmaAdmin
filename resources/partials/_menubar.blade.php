<div class="navigation-agileits">
	<div class="container">
		<nav class="navbar navbar-default">
			<!-- Brand and toggle get grouped for better mobile display -->
			<div class="navbar-header nav_2">
				<button type="button" class="navbar-toggle collapsed navbar-toggle1" data-toggle="collapse" data-target="#bs-megadropdown-tabs"> <span class="sr-only">Toggle navigation</span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
			</div>
			<div class="collapse navbar-collapse" id="bs-megadropdown-tabs">
				<ul class="nav navbar-nav">
					<!-- Mega Menu -->
					{{--<li class="dropdown"> <a href="#" class="dropdown-toggle" data-toggle="dropdown">Science News<b class="caret"></b></a>--}}
						{{--<ul class="dropdown-menu multi-column columns-3">--}}
							{{--<div class="row">--}}
								{{--<div class="multi-gd-img">--}}
									{{--<ul class="multi-column-dropdown">--}}
										{{--<h6>All Groceries</h6>--}}
										{{--<li><a href="groceries.html">Dals & Pulses</a></li>--}}
										{{--<li><a href="groceries.html">Almonds</a></li>--}}
									{{--</ul>--}}
								{{--</div>--}}
							{{--</div>--}}
						{{--</ul>--}}
					{{--</li>--}}
					<li><a href="/" class="{{Request::is('/')? "active":""}}">Home</a></li>
					<li><a href={{url("science/science-news")}}>Science News</a></li>
					<li><a href={{url("science/scientific-theories-and-facts")}}>Scientific Theories And Facts</a></li>
					<li><a href={{url("science/mobile-and-gadgets")}}>Mobile And Gadgets</a></li>
					<li><a href={{url("science/tricks-and-hacks")}}>Tricks And Hacks</a></li>
					<li><a href={{url("science/article")}}>Article</a></li>
					<li><a href={{url("science/science-jokes")}}>Science Jokes</a></li>
				</ul>
			</div>
		</nav>
	</div>
</div>