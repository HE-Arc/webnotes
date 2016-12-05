@extends('layouts.app')

@section('title')
    {{ $group->name }}
@endsection

@section('header')
@endsection

@section('content')
    <div class="container">
        <div class="panel panel-default group-profile">
            <div class="panel-heading">
                <img src="{{ Storage::disk('public')->url($group->icon) }}" alt="{{ $group->name }} Icon" class="img-circle" width="150" height="150">
                <h2>
                    {{ $group->name }}<br/>
                    <small>{{ $group->description }}</small>
                </h2>
            </div>
            <div class="panel-body">
                <div class="btn-pref btn-group btn-group-justified btn-group-lg" role="group" aria-label="...">
                    <div class="btn-group" role="group">
                        <button type="button" id="notes" class="btn btn-default btn-primary" href="#tabM" data-toggle="tab"><span class="glyphicon glyphicon-user" aria-hidden="true"></span>
                            <div class="hidden-xs">Membres</div>
                        </button>
                    </div>
                    <div class="btn-group" role="group">
                        <button type="button" id="members" class="btn btn-default" href="#tabN" data-toggle="tab"><span class="glyphicon glyphicon-file" aria-hidden="true"></span>
                            <div class="hidden-xs">Notes</div>
                        </button>
                    </div>
                </div>

                <div class="well">
                    <div class="tab-content">
                        <div class="tab-pane fade in active" id="tabM">
                            @if(count($group->members) > 0)
                                <ul class="media-list">
                            @foreach($group->members as $member)
                                <li class="media">
                                    <div class="media-left">
                                        <img src="{{ Storage::disk('public')->url($member->avatar) }}" alt="{{$member->name}} Icon" class="img-circle" width="50" height="50"/>
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
                        <div class="tab-pane fade in" id="tabN">
                            <h3>This is tab 2</h3>
                        </div>
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