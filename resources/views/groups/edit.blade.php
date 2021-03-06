@extends('layouts.app')

@section('title')
    {{ $title }}
@endsection

@section('header')
@endsection

@section('content')
    <div class="container">
        @if (count($errors) > 0)
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <div class="panel panel-default">
            <form id="form_group" class="form-horizontal" action="{{ url("/group/".$group->id) }}" method="post" enctype="multipart/form-data">
                {{ csrf_field() }}
                {{ method_field('PATCH') }}
                <div class="panel-heading">
                    <h1>{{ $title." : ".$group->name }}</h1>
                </div>
                <div class="panel-body">
                    <!-- Icon file button -->
                    <div class="form-group" style="text-align: center;">
                        <div class="input-btn">
                            <img id="icon-edit" src="{{ Storage::disk('public')->url($group->icon) }}" alt="Group Icon" class="img-circle" title="Cliquer pour changer d'image" width="150" height="150">
                            <input id="input-icon-edit" name="icon" class="input-file" type="file" accept="image/png, image/jpeg, image/gif"/>
                        </div>
                    </div>
                    <!-- Name text input-->
                    <div class="form-group">
                        <label class="col-md-4 control-label" for="name">Nom du groupe</label>
                        <div class="col-md-5">
                            <input id="name" name="name" type="text" placeholder="Nom" class="form-control input-md" required="" value="{{ $group->name }}"/>
                        </div>
                    </div>
                    <!-- Description textarea -->
                    <div class="form-group">
                        <label class="col-md-4 control-label" for="description">Description</label>
                        <div class="col-md-5">
                            <textarea class="form-control " id="description" name="description">{{ $group->description }}</textarea>
                        </div>
                    </div>
                    <!-- Member search input-->
                    <div class="form-group">
                        <label class="col-md-4 control-label" for="searchMember">Rechercher</label>
                        <div class="col-md-5">
                            <input id="searchMember" name="searchMember" type="search" placeholder="Nom de l'utilisateur" class="form-control input-md"/>
                        </div>
                        <div class="col-md-3">
                            <button type="button" class="btn btn-success" id="addMember">Ajouter</button>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-4"></div>
                        <div class="col-md-5">
                            <select size="3" class="form-control" name="foundedMembers" id="foundedMembers">
                            </select>
                        </div>
                    </div>
                    <div class="col-md-3"></div>
                    <div class="col-md-6">
                        <h2>Membres</h2>
                        <div id="members-list" class="list-group">
                            @foreach($group->members as $member)
                                <div id="{{$member->id}}" class="list-group-item">
                                    <div class="media-body">
                                        <h4 class="media-heading">{{ $member->name }}</h4>
                                        <div class="checkbox">
                                            <label>
                                            @if($member->id == Auth::user()->id)
                                                <input class="adminGroup" name="admin{{ $member->id }}" type="checkbox" checked disabled>
                                            @elseif($member->canModifyGroup($group->id))
                                                <input class="adminGroup" name="admin{{ $member->id }}" type="checkbox" checked>
                                            @else
                                                <input class="adminGroup" name="admin{{ $member->id }}" type="checkbox">
                                            @endif
                                                Administrateur
                                            </label>
                                        </div>
                                    </div>
                                    @if($member->id != Auth::user()->id)
                                    <div class="media-right media-middle">
                                        <button type="button" class="btn btn-default removeMember"><span class="glyphicon glyphicon-remove-circle" aria-hidden="true"></span></button>
                                    </div>
                                    @endif
                                </div>
                            @endforeach
                        </div>
                    </div>
                    <div class="col-md-3"></div>
                </div>
                <div class="panel-footer">
                    <!-- Button (Double) -->
                    <div class="form-group text-right">
                        <div class="col-md-12">
                            <button id="save" name="save" class="btn btn-primary">Sauvegarder</button>
                            <a class="btn btn-default" href="{{ url('/group/'.$group->id) }}" role="button">Annuler</a>
                        </div>
                    </div>
                </div>
                <input type="hidden" name="members" id="members" value=""/>
                <input type="hidden" name="membersPermission" id="membersPermission" value=""/>
            </form>
        </div>
    </div>
@endsection