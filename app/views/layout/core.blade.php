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

        .page-header {
            margin: 0;
        }
        .form-default .form-control:focus {
            z-index: 2;
        }
        .form-default input[type="text"] {
            margin-top: 0px;
            margin-bottom: 20px;

        }

    </style>
</head>
</head>
<body>

<?php
    $menuLT = [
        'Pavadinimas', //0
        'Pagrindinis',
        'Meniu',
        'Produktų kategorijos',//3
        'Gydytojai',
        'Produktai',
        'Klinikos',//6
        'Apsilankymai',
        'Atsijungti',
        'Ar tikrai norite atsijungti?',//9
        'Ataskaitos',
        'Užsakymai',
        'Keisti slaptažodį',
        'Vartotojas'
    ];
    $menuEN = [
        'Name',//0
        'Main',
        'Menu',
        'Categories',//3
        'Doctors',
        'Products',
        'Clinics',//6
        'Visits',
        'Log out',
        'Are you sure you want to log out?',//9
        'Reports',
        'Orders',
        'Change password',//12
        'Account'
    ];

    $lang = Session::get('lang');
    if($lang == 'en'){
        $menu = $menuEN;
    }
    else{
        $menu = $menuLT;
    }
?>
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
            <a  href="/"><img src="{{asset('assets/img/logo.png');}}" height="50" width="50"></a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">
                <li><a href="/">{{$menu[1]}}</a></li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">{{$menu[2]}}<b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        @if(Auth::user()->role == 'direktore')
                        <li><a href="/category">{{$menu[3]}}</a></li>
                        <li><a href="/doctor">{{$menu[4]}}</a></li>
                        <li><a href="/item">{{$menu[5]}}</a></li>
                        <li><a href="/clinic">{{$menu[6]}}</a></li>
						<li><a href="/visit">{{$menu[7]}}</a></li>
                        <li><a href="/report">{{$menu[10]}}</a></li>
                        <li><a href="/order">{{$menu[11]}}</a></li>
                        @endif
                    </ul>
                </li>
            </ul>

            <ul class="nav navbar-nav navbar-right">
                <li><a href="/lang/set/lt">LT</a></li>
                <li><a href="/lang/set/en">ENG</a></li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">{{User::find(Auth::user()->id)->email}}<b class="caret"></b></a>
                    <ul class="dropdown-menu">
                <li><a href="/auth/change">{{$menu[12]}}</a></li>
                <li><a onclick="return confirm('{{$menu[9]}}')"
                       href="/auth/logout">{{$menu[8]}}</a></li>
                    </ul>
                </li>
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
<br>

<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="https://code.jquery.com/jquery.js"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="/js/bootstrap.min.js"></script>
</body>
</html>