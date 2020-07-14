<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>@yield('title')</title>
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Raleway:300,400,500,600,700,800,900" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Roboto:400,500,700,900" rel="stylesheet">
        <link rel="stylesheet" href="{{asset('assets/css/bootstrap.css')}}">
        <link rel="stylesheet" href="{{asset('assets/css/font-awesome.min.css')}}">
        <link rel="stylesheet" href="{{asset('assets/css/owl.carousel.min.css')}}">
        <link rel="stylesheet" href="{{asset('assets/css/owl.theme.default.min.css')}}">
        <link rel="stylesheet" href="{{asset('assets/style.css')}}">
        <link rel="stylesheet" href="{{asset('assets/responsive.css')}}">
    </head>
    <body>
        <div class="wrapper">
            <header class="header">
                <div class="container">
                    <div class="row">
                        <div class="col-md-2">
                            <div class="logo">
                                <!-- Logo icon image, you can use font-icon also -->
                        <b>
                            <img src="{{asset('d_assets/plugins/images/logo1.png')}}" alt="home" class="light-logo" />
                        </b>
                        <!-- Logo text image you can use text also -->
                        <span class="hidden-xs">
                            <img src="{{asset('d_assets/plugins/images/logo2.png')}}" alt="home" class="light-logo" />
                        </span> 
                            </div>
                        </div>
                        <div class="col-md-10">
                            <div class="menu">
                                <ul>
                                    <li class="{{Request::is('/')?'active':''}}"><a href="/">Latest</a></li>
                                    <li class="{{Request::is('local')?'active':''}}"><a href="/local">Local</a></li>
                                    <li class="{{Request::is('sports')?'active':''}}"><a href="/sports">Sports</a></li>
                                    <li class="{{Request::is('lifestyle')?'active':''}}"><a href="/lifestyle">Lifestyle</a></li>
                                    <li class="{{Request::is('entertainment')?'active':''}}"><a href="/entertainment">Entertainment</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </header>
    @yield('content')
    <div class="pegination">
        <div class="nav-links">
            {{$articles->links()}}
        </div>
</div>
</section>
<footer class="footer">
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="footer-bg">
                <div class="row">
                    <div class="col-md-9">
                        <div class="footer-menu">
                            <ul>
                                <li class="{{Request::is('/')?'active':''}}"><a href="/">Latest</a></li>
                                <li class="{{Request::is('local')?'active':''}}"><a href="/local">Local</a></li>
                                <li class="{{Request::is('sports')?'active':''}}"><a href="/sports">Sports</a></li>
                                <li class="{{Request::is('entertainment')?'active':''}}"><a href="/entertainment">Entertainment</a></li>
                                <li class="{{Request::is('lifestyle')?'active':''}}"><a href="/lifestyle">Lifestyle</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="footer-icon">
                            <p><a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a><a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a><a href="#"><i class="fa fa-linkedin" aria-hidden="true"></i></a><a href="#"><i class="fa fa-dribbble" aria-hidden="true"></i></a></p>
                        </div>
                    </div>
                </div> 
            </div>
        </div>
    </div>
</div>
</footer>
</div>
<script src="{{asset('assets/js/jquery-3.1.1.min.js')}}"></script>
<script src="{{asset('assets/js/bootstrap.min.js')}}"></script>
<script src="{{asset('assets/js/owl.carousel.min.js')}}"></script>
<script src="{{asset('assets/js/active.js')}}"></script>
</body>
</html>