@extends('layouts.app')

@section('title')
Edition d'une note
@endsection

@section('header')
    <link rel="stylesheet" href="/css/simplemde.min.css">
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
    <div class="row">
        <div class="col-md-12 col-md-offset-0">
            <div class="panel panel-default">
                <form action="{{ url("/notes/".$note->id) }}" method="post" id="form_note">
                  {{csrf_field()}}
                  {{method_field('PATCH')}}
                    <div class="panel-heading">
                        <div class="form-group">
                            <label for="NoteTitle">Titre</label></br>
                            <label for="NoteTitle">{{ $note->title }}</label>
                        </div>

                        <div class="form-group">
                            <label for="NoteTitle">Description</label></br>
                            <label for="NoteTitle">{{ $note->description }}</label>
                        </div>
                    </div>

                    <div class="panel-body">
                        <div class="form-group">
                            <label for="NoteContent">Contenu</label>
                            <textarea id="NoteContent" name="content">{{ $note->releases()->first()->content }}</textarea>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <!-- Member search input-->
                                <div class="form-group">
                                    <label class="col-md-4 control-label" for="searchMember">Rechercher un membre</label>
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
                                <div class="col-md-12">
                                    <h2>Membres</h2>
                                    <div id="members-list" class="list-group">
                                        @foreach($note->users as $user)
                                            <div id="{{$user->id}}" class="list-group-item">
                                                <div class="media-body">
                                                    <h4 class="media-heading">{{ $user->name }}</h4>
                                                    <div class="checkbox">
                                                        <label>
                                                            @if($user->id == Auth::user()->id)
                                                                <input class="adminGroup" name="admin{{ $user->id }}" type="checkbox" checked disabled>
                                                            @elseif($user->canModifyNote($note->id))
                                                                <input class="adminGroup" name="admin{{ $user->id }}" type="checkbox" checked>
                                                            @else
                                                                <input class="adminGroup" name="admin{{ $user->id }}" type="checkbox">
                                                            @endif
                                                            Administrateur
                                                        </label>
                                                    </div>
                                                </div>
                                                @if($user->id != Auth::user()->id)
                                                    <div class="media-right media-middle">
                                                        <button type="button" class="btn btn-default removeMember"><span class="glyphicon glyphicon-remove-circle" aria-hidden="true"></span></button>
                                                    </div>
                                                @endif
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <!-- Group search input-->
                                <div class="form-group">
                                    <label class="col-md-4 control-label" for="searchGroup">Rechercher un groupe</label>
                                    <div class="col-md-5">
                                        <input id="searchGroup" name="searchGroup" type="search" placeholder="Nom du groupe" class="form-control input-md"/>
                                    </div>
                                    <div class="col-md-3">
                                        <button type="button" class="btn btn-success" id="addGroup">Ajouter</button>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-md-4"></div>
                                    <div class="col-md-5">
                                        <select size="3" class="form-control" name="foundedGroups" id="foundedGroups">
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <h2>Groupes</h2>
                                    <div id="groups-list" class="list-group">
                                        @foreach($note->groups as $group)
                                            <div id="{{$group->id}}" class="list-group-item">
                                                <div class="media-body">
                                                    <h4 class="media-heading">{{ $group->name }}</h4>
                                                    <div class="checkbox">
                                                        <label>
                                                            @if($group->canModifyNote($note->id) == 1)
                                                                <input class="adminGroup" name="admin{{ $group->id }}" type="checkbox" checked>
                                                            @else
                                                                <input class="adminGroup" name="admin{{ $group->id }}" type="checkbox">
                                                            @endif
                                                            Administrateur
                                                        </label>
                                                    </div>
                                                </div>
                                                <div class="media-right media-middle">
                                                    <button type="button" class="btn btn-default removeGroup"><span class="glyphicon glyphicon-remove-circle" aria-hidden="true"></span></button>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="panel-footer">
                        <button type="submit" class="btn btn-primary" id="BtnNoteSave">Enregistrer</button>
                        <a class="btn btn-default" href="{{ url('/notes/'.$note->id) }}" role="button">Annuler</a>
                    </div>
                    <input type="hidden" name="members" id="members" value=""/>
                    <input type="hidden" name="membersPermission" id="membersPermission" value=""/>
                    <input type="hidden" name="groups" id="groups" value=""/>
                    <input type="hidden" name="groupsPermission" id="groupsPermission" value=""/>
                </form>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript" src="/js/simplemde.min.js"></script>
<script>
    var simplemde = new SimpleMDE({
        element: $("#NoteContent")[0],
        forceSync: true,
        showIcons: ["strikethrough", "heading-1", "heading-2", "heading-3", "code", "table", "horizontal-rule"],
    });
    simplemde.codemirror.on("refresh", function() {
        if(simplemde.isFullscreenActive()) {
            $(".navbar").hide()
        } else {
            $(".navbar").show();
        }
    });
</script>
@endsection
