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
        </div>
    </div>
@endsection
