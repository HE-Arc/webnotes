@extends('layouts.app')

@section('title')
    Mes notes
@endsection

@section('header')
@endsection

@section('content')
    <div class="container">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h1>
                    Mes notes
                    <a class="btn btn-success btn-sm" href="{{ url('notes/create') }}" role="button">Nouvelle note</a>
                </h1>
            </div>
            <div class="panel-body">
                @if(count($user->notes) > 0)
                    <ul class="media-list">
                        @foreach($user->notes as $note)
                                <li class="media">
                                    <div class="media-body">
                                        <h4 class="media-heading">
                                            <a href="{{ url($note->path()) }}" role="button">{{ $note->title }}</a>
                                        </h4>
                                        {{ $note->description }}
                                    </div>
                                </li>
                        @endforeach
                    </ul>
                @else
                    Pas de notes !
                @endif
            </div>
        </div>
    </div>
@endsection
