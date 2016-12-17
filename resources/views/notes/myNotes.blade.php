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
                    <div class="list-group">
                        @foreach($user->notes as $note)
                            <a href="{{ route('notes.show', $note) }}" class="list-group-item">
                                <h4 class="list-group-item-heading">{{ $note->title }}</h4>
                                <p class="list-group-item-text">{{ str_limit($note->description) }}</p>
                            </a>
                        @endforeach
                    </div>
                @else
                    Pas de notes !
                @endif
            </div>
        </div>
    </div>
@endsection
