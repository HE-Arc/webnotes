@extends('layouts.app')

@section('title')
    Welcome
@endsection

@section('header')
    <link href="/css/welcome.css" rel="stylesheet">
    <!-- Custom Fonts -->
    <link href="/css/font-awesome.css" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
@endsection

@section('content')
    <!-- Intro Header -->
    <header class="intro">
        <div class="intro-body">
            <div class="container">
                <div class="row">
                    <div class="col-md-8 col-md-offset-2">
                        <h1 class="brand-heading">WebNote++</h1>
                        <p class="intro-text">Application web de prise de notes</p>
                        <p id="group-btn">
                            @if (Auth::guest())
                                <a class="btn btn-lg btn-success" href="{{ url("/login") }}" role="button"><span class="glyphicon glyphicon-log-in" aria-hidden="true"></span> Se connecter</a>
                                <a class="btn btn-lg btn-warning" href="{{ url("/register") }}" role="button"><span class="glyphicon glyphicon-edit" aria-hidden="true"></span> S'inscrire</a>
                            @else
                                <a class="btn btn-lg btn-success" href="{{ url("/account") }}" role="button">Mon compte</a>
                                <a class="btn btn-lg btn-warning" href="{{url("/notes")}}" role="button">Mes notes</a>
                            @endif
                        </p>
                        <p id="about">Durant les études, il n’est pas rare d’avoir besoin de partager ces notes avec ces camarades ou tout du moins une partie d’entre eux. Nous basant sur ce principe il peut être intéressant également pour un professeur, ou un étudiant de vouloir partager ces cours. Il serait donc intéressant de pouvoir partager l’écran de l’application en deux permettant ainsi d’afficher le cours à côté de nos notes.</p>

                        <br/>
                        <ul class="list-inline banner-social-buttons">
                            <li>
                                <a href="https://github.com/HE-Arc/webnotes" class="btn btn-default btn-lg" target="_blank"><i class="fa fa-github fa-fw"></i> <span class="network-name">Github</span></a>
                            </li>
                        </ul>
                        <hr/>
                        <p>Copyright &copy; WebNote++ 2016</p>
                    </div>
                </div>
            </div>
        </div>
    </header>
@endsection
