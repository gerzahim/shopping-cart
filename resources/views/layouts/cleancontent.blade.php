<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="{{ $setting->description_site }}">
    <meta name="author" content="Gerza Salas">
    <title>{{ $setting->title_site }}</title>
    <meta name="keywords" content="{{ $setting->keywords_site }}">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/font-awesome.min.css" rel="stylesheet">
    <link href="css/prettyPhoto.css" rel="stylesheet">
    <link href="css/price-range.css" rel="stylesheet">
    <link href="css/animate.css" rel="stylesheet">
  <link href="css/{{ $setting->css_site }}" rel="stylesheet">
  <link href="css/responsive.css" rel="stylesheet">
    <!--[if lt IE 9]>
    <script src="js/html5shiv.js"></script>
    <script src="js/respond.min.js"></script>
    <![endif]-->       
    <link rel="shortcut icon" href="images/favicon.ico">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="images/favicon.ico">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="images/favicon.ico">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="images/favicon.ico">
    <link rel="apple-touch-icon-precomposed" href="images/favicon.ico">

 @include('layouts.head')    
</head><!--/head-->

<body>


<!-- BEGIN HEADER -->
  <header id="header"><!--header-->
 @include('layouts.header')
<!-- END HEADER -->

<!-- END MENUTOP -->
 @include('layouts.menutop')
   </header><!--/header-->
<!-- END MENUTOP -->

<!-- BEGIN BODY -->
  <section>
    <div class="container">
      <div class="row">
        <div class="col-sm-3">
       
          <!-- BEGIN CONTENT -->         
          @include('layouts.content')
          <!-- END CONTENT -->  


        </div>
      </div>
    </div>
  </section>
<!-- END BODY -->

<!-- BEGIN FOOTER -->
 @include('layouts.footer')
<!-- END FOOTER -->
   
  <script src="js/jquery.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/jquery.scrollUp.min.js"></script>
  <script src="js/price-range.js"></script>
  <script src="js/jquery.prettyPhoto.js"></script>
  <script src="js/main.js"></script>

  @include('layouts.scripts')   
</body>
</html>


