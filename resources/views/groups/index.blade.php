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
                <h1>Mes groupes</h1>
            </div>
            <div class="panel-body">
                <div class="table-responsive">
                    <table class="table table-striped">
                        @for ($i = 0; $i < 10; $i++)
                            <tr><td>{{ $i }}</td></tr>
                        @endfor
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection