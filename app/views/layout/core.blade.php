<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Apskaita</title>

    <!-- Bootstrap -->
    <link href="/css/bootstrap.min.css" rel="stylesheet">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
    <style>


        .form-default {
            max-width: 640px;
            padding: 15px;
            margin: -10 auto;
        }
        .form-default .form-default-heading,
        .form-default .checkbox {

        }
        .form-default .form-control {
            position: relative;
            font-size: 12px;
            padding: 10px;

        }
        .form-default .form-control:focus {
            z-index: 2;
        }
        .form-default input[type="text"] {
            margin-top: 0px;
            margin-bottom: 20px;

        }
        .form-default input[type="submit"] {

        }
        .form-default input[type="dropbox"] {

        }

    </style>
</head>
</head>
<body>

<nav class="navbar navbar-inverse" role="navigation">
    <div class="container-fluid">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="/">Apskaita</a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">
                <li><a href="/">Pagrindinis</a></li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">Meniu <b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li><a href="/category">Produktų kategorijos</a></li>
                        <li><a href="/doctor">Gydytojai</a></li>
                        <li><a href="/item">Produktai</a></li>
                        <li><a href="/clinic">Klinikos</a></li>
						<li><a href="/visit">Apsilankymai</a></li>
                    </ul>
                </li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
                <li><a href="/auth/logout">Atsijungti</a></li>
            </ul>
        </div><!-- /.navbar-collapse -->
    </div><!-- /.container-fluid -->
</nav>

<div class="container">
    @if(($success = Session::get('success')))
        <div class="alert alert-success">
            {{ $success }}
        </div>
    @endif
    @if(($errors = Session::get('errors')))
        <div class="alert alert-danger">
            {{ $errors->first() }}
        </div>
    @endif
    @yield('content')
</div>
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="https://code.jquery.com/jquery.js"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="/js/bootstrap.min.js"></script>
</body>
</html>