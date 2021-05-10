<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Manufacture Docs</title>
    <link rel="icon" type="image/x-icon" href="<?= site_url('favicon.ico') ?>">
    <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <!-- Font Awesome JS -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/solid.css"
          integrity="sha384-QokYePQSOwpBDuhlHOsX0ymF6R/vLk/UQVz3WHa6wygxI5oGTmDTv8wahFOSspdm" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/fontawesome.css"
          integrity="sha384-vd1e11sR28tEK9YANUtpIOdjGW14pS87bUBuOIoBILVWLFnS+MCX9T6MMf0VdPGq" crossorigin="anonymous">
    <style>
        body {
            font-family: 'Montserrat', sans-serif;
            background: rgb(239,240,241);
        }
        body, nav {
            background: radial-gradient(circle, rgba(239,240,241,1) 0%, rgb(233, 225, 253) 100%);
        }
        h1.h1-title {
            color: #ff4143;
            margin: 80px 0 100px 0;
            font-weight: 900 !important;
            font-size: 5vw;
            display: inline-block;
        }

        button {
            background-color: #ff2d20 !important;
        }

        ul li a,a i {
            font-size: 0.9em;
        }
        a.nav-link:hover {
            transition: -webkit-transform .3s ease;
            transition: transform .3s ease;
        }
        a.nav-link:hover {
            -webkit-transform: scale(1.02);
            transform: scale(1.02)
        }
    </style>
</head>
<body class="line-numbers">
<nav class="navbar navbar-expand-lg navbar-light">
    <a class="navbar-brand" href="#"><span style="font-weight: bolder">Manufacture</span></a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav ml-auto mr-5">
            <li class="nav-item">
                <a class="nav-link" href="<?= site_url('docs') ?>">Документация</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#"><i class="fas fa-burn"></i> Примери</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#"><i class="fas fa-download"></i> Свали</a>
            </li>
        </ul>
    </div>
</nav>
<div class="container" style="margin-top: 50px">
    <div class="row">
        <div class="col text-center">
            <img src="<?= site_url('img/logo-1.png') ?>" alt="logo" style="width: 250px; height: auto">
        </div>
    </div>
    <div class="row">
        <div class="col-md-12 text-center">
            <h1 class="h1-title"><span style="color: #000">PHP</span> Manufacture</h1>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
<script>window.jQuery || document.write('<script src="https://code.jquery.com/jquery-3.3.1.min.js"><\/script>')</script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/feather-icons/4.9.0/feather.min.js"></script>
<script src="<?= site_url('js/dashboard.js') ?>"></script>
<!-- jQuery Custom Scroller CDN -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/malihu-custom-scrollbar-plugin/3.1.5/jquery.mCustomScrollbar.concat.min.js"></script>
</body>
</html>
