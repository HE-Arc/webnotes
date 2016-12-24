@extends('layouts/app')

@section('title')
    Mon Compte
@endsection

@section('header')
    <link href="{{ asset('css/account.css') }}" rel="stylesheet">
    <script src="{{ asset('js/account.js') }}"></script>
@endsection

@section('content')
<div class="container">
    <div class="row profile">
        <div class="col-md-4">
            <div class="profile-sidebar">
                <!-- SIDEBAR USERPIC -->
                <div class="profile-userpic">
                    <img src="{{Storage::disk('public')->url(Auth::user()->avatar) }}" class="img-responsive">
                </div>
                <!-- END SIDEBAR USERPIC -->
                <!-- SIDEBAR USER TITLE -->
                <div class="profile-usertitle">
                    <div class="profile-usertitle-name">
                        {{ Auth::user()->name }}
                    </div>
                    <div class="profile-usertitle-job">
                        Membre depuis le: {{ Auth::user()->created_at }}
                    </div>
                </div>
                <!-- END SIDEBAR USER TITLE -->
                <!-- SIDEBAR BUTTONS -->
                <div class="profile-userbuttons">
                    <a role="button" class="btn btn-success btn-sm" href="{{ url('/notes') }}">Mes notes</a>
                    <a role="button" class="btn btn-danger btn-sm" href="{{ url('/group') }}">Mes groupes</a>
                </div>
                <!-- END SIDEBAR BUTTONS -->
                <!-- SIDEBAR MENU -->
                <div class="profile-usermenu">
                    <ul class="nav">
                        <li class="active">
                            <a href="{{ url('/account') }}">
                                <i class="glyphicon glyphicon-home"></i>
                                Aperçu </a>
                        </li>
                        <li>
                            <a href="#" onclick="getAccountSettings(); return false;">
                                <i class="glyphicon glyphicon-user"></i>
                                Paramètre de compte </a>
                        </li>
                        <li>
                            <a href="#" onclick="getResetPass(); return false;">
                                <i class="glyphicon glyphicon-ok"></i>
                                Changer le mot de passe </a>
                        </li>
                        <li>
                            <a href="#" onclick="getHelp(); return false;">
                                <i class="glyphicon glyphicon-flag"></i>
                                Aide </a>
                        </li>
                    </ul>
                </div>
                <!-- END MENU -->
            </div>
        </div>
        <div class="col-md-8">
            <div class="profile-content" id="div1">
                <h1>Apercu du compte de {{ Auth::user()->name }}</h1>
                <h2>Dernière note utilisée</h2>
                <div class="panel panel-default group-profile">
                    <div class="panel-body">
                        <div class="well">
                            @if(count(Auth::user()->notes) > 0)
                                <strong>Titre et description de la dernière note:</strong>
                                <div class="panel-heading">
                                    <h3>
                                        {{ Auth::user()->lastNote()->title }}<br/>
                                        <small>{{ Auth::user()->lastNote()->description }}</small><br/>
                                    </h3>
                                </div>
                                <strong>Vous avez écrit {{count(Auth::user()->notes)}} note(s)</strong>
                            @else
                                Vous n'avez pas encore rédigé de note !
                            @endif
                        </div>
                    </div>
                    <div class="panel-footer">
                        <div class="row">
                            <div class="col-md-6">
                                <a class="btn btn-primary" href="{{ url('/notes') }}" role="button"> Voir la liste de mes notes</a>
                            </div>
                        </div>
                    </div>
                </div>

                <h2>Dernière activité de groupe </h2>
                <div class="panel panel-default group-profile">
                    <div class="panel-body">
                        <div class="well">
                            @if(count(Auth::user()->groups) > 0)
                                <strong>Nom et description du dernier groupe rejoint:</strong>
                                <div class="panel-heading">
                                    <h3>
                                        {{ Auth::user()->lastGroup()->name }}<br/>
                                        <small>{{ Auth::user()->lastGroup()->description }}</small>
                                    </h3>
                                </div>
                                <strong>Vous êtes inscrit dans {{count(Auth::user()->groups)}} groupe(s)</strong>
                            @else
                                Vous n'avez pas encore rejoins de groupe !
                            @endif
                        </div>
                    </div>
                    <div class="panel-footer">
                        <div class="row">
                            <div class="col-md-6">
                                <a class="btn btn-primary" href="{{ url('/group') }}" role="button"> Voir la liste de mes groupes</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection()
