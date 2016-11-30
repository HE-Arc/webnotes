@extends('layouts.app')

@section('title')
    {{ $group->name }}
@endsection

@section('header')
@endsection

@section('content')
    <div class="container">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h1>
                    <img src="{{ $group->icon }}" alt="{{ $group->name }} Icon" class="img-circle" width="150" height="150">
                    {{ $group->name }}
                    <small>{{ $group->description }}</small>
                </h1>
            </div>
            <div class="panel-body">
                <div class="row">
                    <div class="col-md-6">
                        @if(count($group->members) > 0)
                            <ul class="media-list">
                                @foreach($group->members as $member)
                                    <li class="media">
                                        <div class="media-left">
                                            <img src="{{$member->avatar}}" alt="{{$member->name}} Icon" class="img-circle" width="50" height="50"/>
                                        </div>
                                        <div class="media-body">
                                            <h4 class="media-heading">{{ $member->name }}</h4>
                                        </div>
                                    </li>
                                @endforeach
                            </ul>
                        @else
                            Pas de membres !
                        @endif
                    </div>
                    <div class="col-md-6">
                    </div>
                </div>
            </div>
            <div class="panel-footer">
                <div class="row">
                    <div class="col-md-6">
                        <a class="btn btn-primary" href="{{ url('/group') }}" role="button"><span class="glyphicon glyphicon-menu-left" aria-hidden="true"></span>Retour à la liste</a>
                    </div>
                    <div class="col-md-6 text-right">
                        <a class="btn btn-success" href="{{ url($group->path().'/edit') }}" role="button"><span class="glyphicon glyphicon-edit" aria-hidden="true"></span> Editer</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection