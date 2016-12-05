@extends('layouts.app')

@section('title')
    Mes groupes
@endsection

@section('header')
@endsection

@section('content')
    <div class="container">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h1>
                    Mes groupes
                    <a class="btn btn-success btn-sm" href="{{ url('group/create') }}" role="button">Nouveau groupe</a>
                </h1>
            </div>
            <div class="panel-body">
                @if(count($user->groups) > 0)
                    <ul class="media-list">
                        @foreach($user->groups as $group)
                                <li class="media">
                                    <div class="media-left">
                                        <img src="{{ Storage::disk('public')->url($group->icon) }}" alt="{{ $group->name }} Icon" class="img-circle" width="60" height="60">
                                    </div>
                                    <div class="media-body">
                                        <h4 class="media-heading">
                                            <a href="{{ url($group->path()) }}" role="button">{{ $group->name }}</a>
                                        </h4>
                                        {{ $group->description }}
                                    </div>
                                </li>
                        @endforeach
                    </ul>
                @else
                    Pas de groupes !
                @endif
            </div>
        </div>
    </div>
@endsection