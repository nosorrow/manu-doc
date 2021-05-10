<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="generator" content="Jekyll v3.8.5">
    <title>Manufacture Docs</title>
    <link rel="icon" type="image/x-icon" href="{{site_url('favicon.ico')}}">
    <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
    <link rel="stylesheet" href="{{site_url('css/normalize.css')}}">
    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/solid.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/fontawesome.css">
    <!-- Scrollbar Custom CSS -->
    <link rel="stylesheet"
          href="https://cdnjs.cloudflare.com/ajax/libs/malihu-custom-scrollbar-plugin/3.1.5/jquery.mCustomScrollbar.min.css">
    <link href="{{assets_url('prism-default/prism.css') }}" rel="stylesheet"/>
    <!-- Our Custom CSS -->
    <link rel="stylesheet" href="{{site_url('css/style.css')}}?v={{time()}}">
    <style>
        .mCSB_dragger_bar {
            background-color: #0b3e6f !important;
        }

        .bd-placeholder-img {
            font-size: 1.125rem;
            text-anchor: middle;
            -webkit-user-select: none;
            -moz-user-select: none;
            -ms-user-select: none;
            user-select: none;
        }

        @media (min-width: 768px) {
            .bd-placeholder-img-lg {
                font-size: 3.5rem;
            }
        }
    </style>
</head>
<body class="line-numbers">
<div class="wrapper">
    <!-- ======================== Sidebar ===================================  -->
    <nav id="sidebar">
        <div class="sidebar-header">
            <h3 id="sidebar-title">Manufacture</h3>
        </div>
        <ul class="list-unstyled components">
            <li>
                <a href="#basicClass" data-toggle="collapse" aria-expanded="true" class="dropdown-toggle">Справочник</a>
                <ul class="collapse list-unstyled show" id="basicClass">
                    {!! $sidebar_menu !!}
                </ul>
            </li>
            <li>
                <a href="#">Contact</a>
            </li>
        </ul>
        <ul class="list-unstyled CTAs">
            <li>
                <a href="https://bootstrapious.com/tutorial/files/sidebar.zip" class="download">Download source</a>
            </li>
            <li>
                <a href="https://bootstrapious.com/p/bootstrap-sidebar" class="article">Back to article</a>
            </li>
        </ul>
    </nav>
    <!-- ====== Page Content ========== -->
    <div id="content">
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container-fluid">
                <button type="button" id="sidebarCollapse" class="btn btn-info">
                    <i class="fas fa-align-left"></i>
                    <span></span>
                </button>
                <button class="btn btn-dark d-inline-block d-lg-none ml-auto" type="button" data-toggle="collapse"
                        data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                        aria-expanded="false" aria-label="Toggle navigation">
                    <i class="fas fa-align-justify"></i>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="nav navbar-nav ml-auto">
                        <li class="nav-item">
                            <a class="nav-link" href="{{site_url()}}">
                                <i class="fas fa-home"></i>
                                НАЧАЛО</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">
                                <i class="fas fa-burn"></i>
                                ПРИМЕРИ</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">
                                <i class="fas fa-download"></i>
                                СВАЛИ</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
        <div class="metalsmith-content" id="home">
            @yield('content')
            <div class="row">
                <div class="col-md-6 offset-md-3">
                    @if($prev)
                        <a class="btn btn-light mr-5" href="{{site_url($prev)}}">&#8672 предишна</a>
                    @endif
                    @if($next)
                        <a class="btn btn-light" href="{{site_url($next)}}">следваща &#8674</a>
                    @endif
                </div>
            </div>
            <div style="position:fixed; bottom: 50%; right: 50px; font-size: 1.5rem">
                <a href="#home" id="arrow" style="display: none">&#8673;</a>
            </div>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/feather-icons/4.9.0/feather.min.js"></script>
<script src="{{site_url('js/dashboard.js')}}"></script>
<script src="{{assets_url('prism-default/prism.js')}}"></script>
<!-- jQuery Custom Scroller CDN -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/malihu-custom-scrollbar-plugin/3.1.5/jquery.mCustomScrollbar.concat.min.js"></script>
<script type="text/javascript">
    $(document).ready(function () {
        $("table").addClass('table table-hover table-striped');

        $("#sidebar").mCustomScrollbar({
            theme: "minimal"
        });
        $('#sidebarCollapse').on('click', function () {
            $('#sidebar, #content').toggleClass('active');
            $('.collapse.in').toggleClass('in');
            $('a[aria-expanded=true]').attr('aria-expanded', 'false');
        });

        var url = window.location;
        var element = $('ul li a').filter(function () {
            return this.href == url;
        }).parent().addClass('active');

        while (true) {
            if (element.is('li')) {
                element = element.parent().addClass('show').parent();
            } else {
                break;
            }
        }

        window.addEventListener('scroll', function (e) {
            // show hide #home
            var h = $(window).scrollTop();
            if (h > 500) {
                $('#arrow').show();
            } else {
                $('#arrow').hide();
            }
        });
    });
</script>
</body>
</html>
