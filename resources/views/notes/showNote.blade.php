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
                      <ul class="media-list">
                          @foreach($note->releases as $release)
                                  <li class="media">
                                      <div class="media-body">
                                          {{ $release->updated_at}}
                                        </br>
                                          {{ $release->content }}
                                      </div>
                                  </li>
                          @endforeach
                      </ul>
                  @else
                      Pas de notes !
                  @endif
                </div>
            </div>
            <div class="panel-footer">
                <div class="row">
                    <div class="col-md-6">
                        <a class="btn btn-primary" href="{{ url('/notes') }}" role="button"><span class="glyphicon glyphicon-menu-left" aria-hidden="true"></span>Retour à la liste</a>
                        <a class="btn btn-primary" href="{{ url('/notes') }}" role="button"><span aria-hidden="true"></span>Modifier</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
