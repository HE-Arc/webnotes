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
                        <button type="button" id="members" class="btn btn-default btn-primary" href="#tabN" data-toggle="tab"><span class="glyphicon glyphicon-file" aria-hidden="true"></span>
                            <div class="hidden-xs">Notes</div>
                        </button>
                    </div>
                    <div class="btn-group" role="group">
                        <button type="button" id="notes" class="btn btn-default" href="#tabM" data-toggle="tab"><span class="glyphicon glyphicon-user" aria-hidden="true"></span>
                            <div class="hidden-xs">Membres</div>
                        </button>
                    </div>
                </div>

                <div class="well">
                    <div class="tab-content">
                        <div class="tab-pane fade in active" id="tabN">
                            @if(count($group->notes) > 0)
                                <div class="list-group">
                                    @foreach($group->notes as $note)
                                        <a href="{{ url("/notes/".$note->id) }}" class="list-group-item">
                                            <h4 class="list-group-item-heading">{{ $note->title }}</h4>
                                            <p class="list-group-item-text">{{ str_limit($note->description) }}</p>
                                        </a>
                                    @endforeach
                                </div>
                            @else
                                Pas de notes !
                            @endif
                        </div>
                        <div class="tab-pane fade in" id="tabM">
                            @if(count($group->members) > 0)
                                <div class="list-group">
                            @foreach($group->members as $member)
                                    <div class="list-group-item">
                                        <div class="media-left">
                                            <img src="{{ Storage::disk('public')->url($member->avatar) }}" alt="{{$member->name}} Icon" class="img-circle" width="50" height="50"/>
                                        </div>
                                        <div class="media-body">
                                            <h4 class="media-heading">{{ $member->name }}</h4>
                                            {{ $member->email }}
                                        </div>
                                    </div>
                            @endforeach
                                </div>
                            @else
                                Pas de membres !
                            @endif
                        </div>
                    </div>
                </div>
            </div>
            <div class="panel-footer">
                <div class="row">
                    <div class="col-md-6">
                        <a class="btn btn-primary" href="{{ url('/group') }}" role="button"><span class="glyphicon glyphicon-menu-left" aria-hidden="true"></span>Retour à la liste</a>
                    </div>
                    @if(Auth::user()->canModifyGroup($group->id) == 1)
                        <div class="col-md-6 text-right">
                            <a class="btn btn-success" href="{{ url('/group/'.$group->id.'/edit') }}" role="button"><span class="glyphicon glyphicon-edit" aria-hidden="true"></span> Editer</a>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection