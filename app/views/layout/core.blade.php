<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Apskaita</title>

    <!-- Bootstrap -->
    <link href="/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="/css/dateinput.css"/>

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="/js/jquery.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="/js/bootstrap.min.js"></script>
    <script src="/js/jquery.tools.min.js"></script>
    <script src="/js/apsilankymai.js"></script>


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
        .page-header {
            text-align: center;
        }

    </style>
</head>

<?php
    function echoActiveClassIfRequestMatches($requestUri)
    {
        $current_file_name = basename($_SERVER['REQUEST_URI'], ".php");

        if ($current_file_name == $requestUri)
            echo 'class="active"';
    }
    function echoActiveClassIfLangMatches($lang)
    {
        $curr_lang = Session::get('lang');

        if ($curr_lang == $lang)
            echo 'class="active"';
    }

?>

<body>

<nav class="navbar navbar-inverse" role="navigation">
    <div class="container-fluid">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle"
                    data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">

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
                <li  <?=echoActiveClassIfRequestMatches("")?>><a href="/">{{trans('menu.name')}}</a></li>

                @if(Auth::user()->role == 'direktore')
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">{{trans('menu.add_data')}}<b class="caret"></b></a>
                        <ul class="dropdown-menu">
                            <li <?=echoActiveClassIfRequestMatches("category")?>>
                                <a href="/category">{{trans('menu.categories')}}</a>
                            </li>

                            <li <?=echoActiveClassIfRequestMatches("doctor")?>>
                                <a href="/doctor">{{trans('menu.doctors')}}</a>
                            </li>

                            <li <?=echoActiveClassIfRequestMatches("item")?>>
                                <a href="/item">{{trans('menu.items')}}</a>
                            </li>

                            <li <?=echoActiveClassIfRequestMatches("clinic")?>>
                                <a href="/clinic">{{trans('menu.clinics')}}</a>
                            </li>

                            <li <?=echoActiveClassIfRequestMatches("visit")?>>
                                <a href="/visit">{{trans('menu.visits')}}</a>
                            </li>

                            <li <?=echoActiveClassIfRequestMatches("order")?>>
                                <a href="/order">{{trans('menu.orders')}}</a>
                            </li>
                        </ul>
                    </li>
                <li><a href="/invoice">{{trans('menu.invoice')}}</a></li>
                @endif

                <li <?=echoActiveClassIfRequestMatches("report")?>>
                    <a href="/report">{{trans('menu.reports')}}</a>
                </li>


            </ul>

            <ul class="nav navbar-nav navbar-right">
                <li <?=echoActiveClassIfLangMatches("lt")?>><a href="/lang/set/lt">LT</a></li>
                <li <?=echoActiveClassIfLangMatches("en")?>><a href="/lang/set/en">ENG</a></li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        {{User::find(Auth::user()->id)->email}}<b class="caret"></b>
                    </a>

                    <ul class="dropdown-menu">
                        @if(Auth::user()->role == 'direktore')
                            <li><a href="/auth/add">{{trans('menu.add_user')}}</a></li>
                        @endif
                        <li><a href="/auth/change">{{trans('menu.change_pwd')}}</a></li>
                        <li><a onclick="return confirm('{{trans('menu.log_out_msg')}}')"
                            href="/auth/logout">{{trans('menu.log_out')}}</a>
                        </li>
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

    @if((isset($header) && ($header != null)))
        <div class="page-header">
            <h3>{{$header}}</h3>
        </div>
    @endif

    @yield('content')
</div>
<br>

</body>
</html>