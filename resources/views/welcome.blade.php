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
                        <a href="#about" class="btn btn-circle page-scroll">
                            <i class="fa fa-angle-double-down animated"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <!-- About Section -->
    <section id="about" class="container content-section text-center">
        <div class="row">
            <div class="col-lg-8 col-lg-offset-2">
                <h2>A Propos</h2>
                <p>Durant les études, il n’est pas rare d’avoir besoin de partager ces notes avec ces camarades ou tout du moins une partie d’entre eux. Nous basant sur ce principe il peut être intéressant également pour un professeur, ou un étudiant de vouloir partager ces cours. Il serait donc intéressant de pouvoir partager l’écran de l’application en deux permettant ainsi d’afficher le cours à côté de nos notes.</p>
            </div>
        </div>
    </section>
    <!-- Contact Section -->
    <section id="contact" class="container content-section text-center">
        <div class="row">
            <div class="col-lg-8 col-lg-offset-2">
                <h2>Contact</h2>
                <a href="mailto:steve.nadalin@he-arc.ch" target="_blank">Nadalin Steve</a><br>
                <a href="mailto:nicolas.sommer@he-arc.ch" target="_blank">Sommer Nicola</a><br>
                <a href="mailto:daniel.rodrigueslourenco@he-arc.ch" target="_blank">Rodrigues Lourenço Daniel</a><br>
                <a href="http://www.he-arc.ch/" target="_blank">HE-Arc Ingénierie, Neuchâtel</a><br><br>
                <ul class="list-inline banner-social-buttons">
                    <li>
                        <a href="https://github.com/HE-Arc/webnotes" class="btn btn-default btn-lg" target="_blank"><i class="fa fa-github fa-fw"></i> <span class="network-name">Github</span></a>
                    </li>
                </ul>
            </di>
        </div>
    </section>

    <!-- Footer -->
    <footer>
        <div class="container text-center">
            <p>Copyright &copy; WebNote++ 2016</p>
        </div>
    </footer>

    <!-- Plugin JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.3/jquery.easing.min.js"></script>
    <!-- Theme JavaScript -->
    <script src="/js/welcome.js"></script>
@endsection
