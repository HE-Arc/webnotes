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
                        <div class="table-responsive">
                            <table class="table table-stripped">
                                @foreach($group->members as $member)
                                    <tr>
                                        <td><img src="{{$member->avatar}}" alt="{{$member->name}} Icon" class="img-circle" width="50" height="50"/></td>
                                        <td>{{$member->name}}</td>
                                    </tr>
                                @endforeach
                            </table>
                        </div>
                    </div>
                    <div class="col-md-6">
                    </div>
                </div>
            </div>
            <div class="panel-footer">
                <a class="btn btn-primary" href="{{ url('/group') }}" role="button"><span class="glyphicon glyphicon-menu-left" aria-hidden="true"></span>Retour à la liste</a>
            </div>
        </div>
    </div>
@endsection