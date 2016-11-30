@extends('layouts/app')
<link href="/css/account.css" rel="stylesheet">
@section('content')
<h1>
    {{ Auth::user()->name }}'s {{ $title }}
</h1>

<div class="container">
    <div class="row profile">
        <div class="col-md-3">
            <div class="profile-sidebar">
                <!-- SIDEBAR USERPIC -->
                <div class="profile-userpic">
                    <img src="http://2.bp.blogspot.com/-QsXXPjalfx0/Vmcji9CuZ0I/AAAAAAAAAXo/NLwaOpQeDbI/s1600/Kid_Goku.jpg" class="img-responsive" alt="">
                </div>
                <!-- END SIDEBAR USERPIC -->
                <!-- SIDEBAR USER TITLE -->
                <div class="profile-usertitle">
                    <div class="profile-usertitle-name">
                        {{ Auth::user()->name }}
                    </div>
                    <div class="profile-usertitle-job">
                        {{ Auth::user()->email }}
                    </div>
                </div>
                <!-- END SIDEBAR USER TITLE -->
                <!-- SIDEBAR BUTTONS -->
                <div class="profile-userbuttons">
                    <button type="button" class="btn btn-success btn-sm">Change mail</button>
                    <button type="button" class="btn btn-danger btn-sm">Change username</button>
                </div>
                <!-- END SIDEBAR BUTTONS -->
                <!-- SIDEBAR MENU -->
                <div class="profile-usermenu">
                    <ul class="nav">
                        <li class="active">
                            <a href="#">
                                <i class="glyphicon glyphicon-home"></i>
                                Overview </a>
                        </li>
                        <li>
                            <a href="#">
                                <i class="glyphicon glyphicon-user"></i>
                                Account Settings </a>
                        </li>
                        <li>
                            <a href="#" target="_blank">
                                <i class="glyphicon glyphicon-ok"></i>
                                Tasks </a>
                        </li>
                        <li>
                            <a href="#">
                                <i class="glyphicon glyphicon-flag"></i>
                                Help </a>
                        </li>
                    </ul>
                </div>
                <!-- END MENU -->
            </div>
        </div>
        <div class="col-md-9">
            <div class="profile-content">
                Some user related content goes here...
            </div>
        </div>
    </div>
</div>


@endsection()
