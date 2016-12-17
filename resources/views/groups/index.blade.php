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
                @if(count($groups) > 0)
                    <div class="list-group">
                        @foreach($groups as $group)
                            <a href="{{ url("/group/".$group->id) }}" class="list-group-item">
                                <div class="media-left">
                                    <img src="{{ Storage::disk('public')->url($group->icon) }}" alt="{{ $group->name }} Icon" class="img-circle" width="60" height="60">
                                </div>
                                <div class="media-body">
                                    <h4 class="media-heading">
                                        {{ $group->name }}
                                    </h4>
                                    {{ str_limit($group->description) }}
                                </div>
                            </a>
                        @endforeach
                    </div>
                @else
                    Pas de groupes !
                @endif
            </div>
        </div>
    </div>
@endsection