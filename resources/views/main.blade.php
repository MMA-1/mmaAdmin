<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>@yield('title')</title>

    <!-- Bootstrap -->
    <!-- Latest compiled and minified CSS -->

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    {{--<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">--}}
   {{Html::style('css/jquery-sakura.min.css')}}
    {{Html::style('css/bootstrap.min.css')}}
    {{Html::style('css/styles.css')}}
    @yield('stylesheet')
  </head>
  <body>
    <!-- Default Vavbar  -->
    <nav class="navbar navbar-default">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="#">Shayeri Urdu</a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        {{--<li class="{{Request::is('/')? "active":""}}"><a href="/">Home <span class="sr-only">(current)</span></a></li>--}}
        {{--<li class="{{Request::is('shayari')? "active":""}}"><a href="/blog">Blog</a></li>--}}
        {{--<li class="{{Request::is('about')? "active":""}}"><a href="/about">About</a></li>--}}
        {{--<li class="{{Request::is('contact')? "active":""}}"><a href="/contact">Contact</a></li>--}}
       
      </ul>
     @if(Auth::check())
      <ul class="nav navbar-nav navbar-right">
        <li><a href="#">Link</a></li>
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Hello {{Auth::user()->name}} <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="{{route('posts.index')}}">List Posts</a></li>
            <li><a href="{{route('posts.create')}}">Create Post</a></li>
            <li><a href="{{route('categories.index')}}">Categories</a></li>
            <li><a href="{{route('subcategories.index')}}">Sub Categories</a></li>
            <li><a href="{{route('tags.index')}}">Tags</a></li>
            <li><a href="{{route('gallery.create')}}">Create Photo Gallery</a></li>
            <li><a href="{{route('gallery.index')}}">List Photo Gallery</a></li>
            <li role="separator" class="divider"></li>
            <li><a href="{{route('logout')}}">Logout</a></li>
          </ul>
        </li>
      </ul>
       @else
        <a href="{{route('login')}}" class="btn btn-success pull-right">Login</a></li>
      @endif
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>
<div class="container">
    @include('partials._messages')
  {{Auth::check()? "Logged In":"Logged Out"}}
   @yield('content')


   <hr>
   <p>Copyright MMA - All right reserved.</p>
</div>
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    {{--<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>--}}
    {{Html::script('js/jquery.min.js')}}

    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
   @yield('scripts')
  </body>
</html>