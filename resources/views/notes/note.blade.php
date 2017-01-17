@extends('layouts.app')

@section('title')
    Création d'une note
@endsection

@section('header')
    <link rel="stylesheet" href="/css/simplemde.min.css">
    <script type="text/javascript" src="/js/simplemde.min.js"></script>
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
                <form action="{{ url("/notes") }}" method="post" id="form_note">
                  {{csrf_field()}}
                    <div class="panel-heading">
                        <div class="form-group">
                            <label for="NoteTitle">Titre</label>
                            <input type="text" class="form-control" placeholder="Title" id="NoteTitle" name="title">
                        </div>
                        <div class="form-group">
                            <label for="NoteTitle">Description</label>
                            <textarea class="form-control" rows="3" placeholder="Description" id="NoteDescription" name="description"></textarea>
                        </div>
                    </div>
                    <div class="panel-body">
                        <div class="form-group">
                            <label for="NoteContent">Contenu</label>
                            <textarea id="NoteContent" name="content"></textarea>
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
                                        <div id="{{ Auth::user()->id}}" class="list-group-item">
                                            <div class="media-body">
                                                <h4 class="media-heading">{{ Auth::user()->name }}</h4>
                                                <div class="checkbox">
                                                    <label>
                                                        <input class="adminGroup" name="admin{{ Auth::user()->id }}" type="checkbox" checked disabled>
                                                        Administrateur
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
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
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="panel-footer">
                        <button type="submit" class="btn btn-primary" id="BtnNoteSave">Enregistrer</button>
                        <a class="btn btn-default" href="{{ url('/notes') }}" role="button">Annuler</a>
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
<script>
    var simplemde = new SimpleMDE({
        element: $("#NoteContent")[0],
        forceSync: true,
        placeholder: "Contenu de la note...",
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
