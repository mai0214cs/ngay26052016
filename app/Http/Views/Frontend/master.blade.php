<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        @yield('header')
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300italic,400italic,600,600italic' rel='stylesheet' type='text/css'>
        <link href='http://fonts.googleapis.com/css?family=Crete+Round' rel='stylesheet' type='text/css'>
        <link href='http://fonts.googleapis.com/css?family=Crete+Round' rel='stylesheet' type='text/css'>
        <link href="/library/css/bootstrap.css" rel="stylesheet">
        <link href="/library/css/bootstrap-responsive.css" rel="stylesheet">
        <link href="/library/css/style.css" rel="stylesheet">
        <link href="/library/css/flexslider.css" type="text/css" media="screen" rel="stylesheet"  />
        <link href="/library/css/jquery.fancybox.css" rel="stylesheet">
        <link href="/library/css/cloud-zoom.css" rel="stylesheet">

        <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
        <!--[if lt IE 9]>
              <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
            <![endif]-->
        <!-- fav -->
        <link rel="shortcut icon" href="/library/assets/ico/favicon.html">
    </head>
    <body>
        <!-- Header Start -->
        <header>
            <div class="headerstrip">
                <div class="container">
                    <div class="row">
                        <div class="span12">
                            {{-- Logo --}}
                            @include('Moduls.Logo', ['Configs'=>$Configs])
                            {{-- Top Menu --}}
                            @include('Moduls.TopMenu', [])
                        </div>
                    </div>
                </div>
            </div>
            
            {{-- Trình diễn ảnh --}}
            @include('Moduls.MainMenu', ['menus'=>$ModulMainMenu]);
        </header>
        <!-- Header End -->

        <div id="maincontainer">
            @yield('content');
        </div>
        {{-- Footer --}}
        @include('Moduls.Footer', ['content'=>$ModulsContentHTML['Nội dung Footer']]);
        <!-- javascript
            ================================================== -->
        <!-- Placed at the end of the document so the pages load faster -->
        <script src="/library/js/jquery.js"></script>
        <script src="/library/js/bootstrap.js"></script>
        <script src="/library/js/respond.min.js"></script>
        <script src="/library/js/application.js"></script>
        <script src="/library/js/bootstrap-tooltip.js"></script>
        <script defer src="/library/js/jquery.fancybox.js"></script>
        <script defer src="/library/js/jquery.flexslider.js"></script>
        <script type="text/javascript" src="/library/js/jquery.tweet.js"></script>
        <script  src="/library/js/cloud-zoom.1.0.2.js"></script>
        <script  type="text/javascript" src="/library/js/jquery.validate.js"></script>
        <script type="text/javascript"  src="/library/js/jquery.carouFredSel-6.1.0-packed.js"></script>
        <script type="text/javascript"  src="/library/js/jquery.mousewheel.min.js"></script>
        <script type="text/javascript"  src="/library/js/jquery.touchSwipe.min.js"></script>
        <script type="text/javascript"  src="/library/js/jquery.ba-throttle-debounce.min.js"></script>
        <script defer src="/library/js/custom.js"></script>
    </body>
</html>