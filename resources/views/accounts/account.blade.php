@extends('layouts/app')
<link href="/css/account.css" rel="stylesheet">
<script src="/js/account.js"></script>
@section('content')

<div class="container">
    <div class="row profile">
        <div class="col-md-4">
            <div class="profile-sidebar">
                <!-- SIDEBAR USERPIC -->
                <div class="profile-userpic">
                    <img src="{{Storage::disk('public')->url(Auth::user()->avatar) }}" class="img-responsive" width="100" height="100">
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
                    <button type="button" class="btn btn-success btn-sm" onclick="location.href = 'notes/'">Mes notes</button>
                    <button type="button" class="btn btn-danger btn-sm" onclick="deleteAccount(); return false;">Supprimer compte</button>
                </div>
                <!-- END SIDEBAR BUTTONS -->
                <!-- SIDEBAR MENU -->
                <div class="profile-usermenu">
                    <ul class="nav">
                        <li class="active">
                            <a href="#" onclick="getOverview(); return false;">
                                <i class="glyphicon glyphicon-home"></i>
                                Aperçu </a>
                        </li>
                        <li>
                            <a href="#" onclick="getAccountSettings(); return false;">
                                <i class="glyphicon glyphicon-user"></i>
                                Paramètre de compte </a>
                        </li>
                        <li>
                            <a href="#" >
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
                Some user related content goes here...
            </div>
        </div>
    </div>
</div>


@endsection()
