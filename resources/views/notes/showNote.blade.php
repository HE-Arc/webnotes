@extends('layouts.app')

@section('title')
    {{ $note->title }}
@endsection

@section('header')
@endsection

@section('content')
    <div class="container">
        <div class="panel panel-default group-profile">
            <div class="panel-heading">
                <h2>
                    {{ $note->title }}<br/>
                    <small>{{ $note->description }}</small>
                </h2>
            </div>
            <div class="panel-body">
                <div class="well">
                  @if(count($note->releases) > 0)
                    <div class="list-group">
                        @foreach($note->releases as $release)
                            <div class="list-group-item">
                                <h4 class="list-group-item-heading">{{ $release->updated_at }}</h4>
                                <p class="list-group-item-text">{{ str_limit($release->content, 500) }}</p>
                            </div>
                        @endforeach
                    </div>
                  @else
                      Pas de notes !
                  @endif
                </div>
            </div>
            <div class="panel-footer">
                <div class="row">
                    <div class="col-md-6">
                        <a class="btn btn-primary" href="{{ url('/notes') }}" role="button"><span class="glyphicon glyphicon-menu-left" aria-hidden="true"></span>Retour à la liste</a>
                        <a class="btn btn-primary" href="{{ url('/notes/'.$note->id.'/edit') }}" role="button"><span aria-hidden="true"></span>Modifier</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
