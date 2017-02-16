
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="{{ $setting->description_site }}">
    <meta name="author" content="Gerza Salas">
    <title>{{ $setting->title_site }}</title>
    <meta name="keywords" content="{{ $setting->keywords_site }}">
    {{-- 
   <!--
    <meta name="keywords" content="electronics, miami, sales">
    <meta name="keywords" content="Hookah, miami, sales">
    
    <meta name="keywords" content="Hookah, miami, sales">
    <title>.:: Doral | Hookah ::.</title>
    <title>.||| {{ dd($settings->title_site) }} ::.</title> --> 

    --}}
    <link href="{{ URL::to('css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ URL::to('css/font-awesome.min.css') }}" rel="stylesheet">
    <link href="{{ URL::to('css/prettyPhoto.css') }}" rel="stylesheet">
    <link href="{{ URL::to('css/price-range.css') }}" rel="stylesheet">
    <link href="{{ URL::to('css/animate.css') }}" rel="stylesheet">
    <link href="{{ URL::to('engine_modal/sweetalert.css') }}" rel="stylesheet">


    <!--
    <link href="{{ URL::to('css/main.css') }}" rel="stylesheet">
    <link href="{{ URL::to('css/main1.css') }}" rel="stylesheet">
    <link href="css/{{ $setting->css_site }}" rel="stylesheet">
    <link href="{{ URL::to('css/main_doralhookah.css') }}" rel="stylesheet">
    
    -->    
  
  
  <link href="{{ URL::to('css/'.$setting->css_site) }}" rel="stylesheet">
    <!--[if lt IE 9]>
    <script src="js/html5shiv.js"></script>
    <script src="js/respond.min.js"></script>
    <![endif]-->       
    <link rel="shortcut icon" href="{{ URL::to('images/favicon.ico') }}">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="{{ URL::to('images/favicon.ico') }}">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="{{ URL::to('images/favicon.ico') }}">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="{{ URL::to('images/favicon.ico') }}">
    <link rel="apple-touch-icon-precomposed" href="{{ URL::to('images/favicon.ico') }}">

 @include('layouts.head')    
</head><!--/head-->

<body>

<!-- BEGIN HEADER -->
  <header id="header"><!--header-->
 @include('layouts.header')
<!-- END HEADER -->

<!-- END MENUTOP -->
@if( $setting->dark_menu == 0)
  @include('layouts.menutop')
@else{
  @include('layouts.menutop_dark')
}
@endif

   </header><!--/header-->
<!-- END MENUTOP -->

{{-- 
<!--  Modal ask - windows confirm over 18+ 

@if(Session::has('modal_ask'))
      {{ Session::get('modal_ask') }}
@endif
-->
--}}

@if(Session::has('message'))

   <div class="header-bottom"><!--header-bottom-->
      <div class="container">
        <div class="row">
          <div class="col-sm-12">          
              <div class="alert alert-danger">
                {{ Session::get('message') }}
              </div>            
          </div>
        </div>
      </div>
    </div><!--/header-bottom-->

@endif

<!-- BEGIN BANNER -->
 @include('layouts.banner')
<!-- END BANNER -->

<!-- BEGIN BODY -->
  <section>
    <div class="container">
      <div class="row">
        <div class="col-sm-3">

          <!-- BEGIN SIDEBAR -->
          @include('layouts.sidebar')
          <!-- END SIDEBAR -->
        
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
   
  <script src="{{ URL::to('js/jquery.js') }}"></script>
  <script src="{{ URL::to('js/bootstrap.min.js') }}"></script>
  <script src="{{ URL::to('js/jquery.scrollUp.min.js') }}"></script>
  <script src="{{ URL::to('js/price-range.js') }}"></script>
  <script src="{{ URL::to('js/jquery.prettyPhoto.js') }}"></script>
  <script src="{{ URL::to('js/main.js') }}"></script>
    <script src="{{ URL::to('engine_modal/sweetalert-dev.js') }}"></script> 
 @include('layouts.scripts')    



<!-- BEGIN MODAL ASK OVER +18 -->
@if( $setting->modal_ask == 1)

  @if(!Session::has('modal_ask'))
    <script>

      var token = '{{ Session::token() }}';
      var url = '{{ route('setmodalask') }}';    
      var urlu = '{{ route('unsetmodalask') }}';

      //$setting->modal_ask == 0
      swal({
        title: "Are you 18 or over?",
        text: "You must be 18 or over to enter this website.!",
        type: "warning",
        showCancelButton: true,
        confirmButtonColor: '#DD6B55',
        confirmButtonText: 'Yes!',
        cancelButtonText: "No!",
        closeOnConfirm: false,
        closeOnCancel: false
      },
      function(isConfirm){
        if (isConfirm){

          $.ajax({
            method: "POST",
            url: url,
            //data: dataString,
            data: { _token: token},
            success: function(data) {
             console.log(data);
            }
          });

          swal("Welcome!", "", "success");
        //window.location = "http://google.com";
        } else {

          $.ajax({
            method: "POST",
            url: urlu,
            //data: dataString,
            data: { _token: token},
            success: function(data) {
             console.log(data);
            }
          });
        
          window.location = "http://google.com";
          //swal("Cancelled", "Your imaginary file is safe :)", "error");
        }
      });
    </script>
  @endif

@endif
<!-- END MODAL ASK OVER +18 -->


</body>
</html>


