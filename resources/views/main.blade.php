<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en">
<!--<![endif]-->

<!-- BEGIN HEAD -->
<head>
  <meta charset="UTF-8" />
    <title>@yield('title')</title>
  <meta content="width=device-width, initial-scale=1.0" name="viewport" />
  {{Html::style('assets/plugins/bootstrap/css/bootstrap.css')}}
  {{Html::style('assets/css/main.css')}}
  {{Html::style('assets/css/theme.css')}}
  {{Html::style('assets/css/MoneAdmin.css')}}
  {{Html::style('assets/plugins/Font-Awesome/css/font-awesome.css')}}
  <!--END GLOBAL STYLES -->

  <!-- END PAGE LEVEL  STYLES -->
  <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
  <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
  <![endif]-->
    @yield('stylesheet')
  </head>
  <body class="padTop53">
  <div id="wrap">
  <!-- HEADER SECTION -->
  @include('partials._adminheader')
  <!-- END HEADER SECTION -->

  <!-- MENU SECTION -->
  @include('partials._adminsidenav')
  <!--END MENU SECTION -->
<div id="content">
    @include('partials._messages')

   @yield('content')


   <hr>

</div>
  </div>
  <div id="footer">
    <p>&copy;  MMA &nbsp;2017 &nbsp;</p>
  </div>
    {{Html::script('assets/plugins/jquery-2.0.3.min.js')}}
    {{Html::script('assets/plugins/bootstrap/js/bootstrap.min.js')}}
   @yield('scripts')
  </body>
</html>