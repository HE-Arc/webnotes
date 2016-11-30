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
                <div class="table-responsive">
                    @if(count($groups) > 0)
                        <table class="table table-striped">
                            @foreach($groups as $group)
                                <tr>
                                    <td><img src="{{ $group->icon }}" alt="{{ $group->name }} Icon" class="img-circle" width="60" height="60"></td>
                                    <td>{{ str_limit($group->name, 50) }}</td>
                                    <td>{{ str_limit($group->description, 50) }}</td>
                                    <td><a href="#" role="button">Voir les notes</a></td>
                                    <td><a href="{{ url($group->path()) }}" role="button">Détails</a></td>
                                </tr>
                            @endforeach
                        </table>
                    @else
                        Pas de groupes !
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection