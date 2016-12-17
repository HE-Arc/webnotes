@extends('layouts.app')

@section('title')
Liste Notes
@endsection

@section('header')
    <link rel="stylesheet" href="/css/simplemde.min.css">
@endsection

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-16 col-md-offset-0">
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
                                <h2>Recherche d'un membre</h2>
                                <!-- Member search input-->
                                <div class="form-group col-md-6">
                                    <div class="col-md-10">
                                        <input id="searchMemberNote" name="searchMemberNote" type="search" placeholder="Nom de l'utilisateur" class="form-control input-md"/>
                                    </div>
                                    <div class="col-md-2">
                                        <button type="button" class="btn btn-success" id="addMemberNote">Ajouter</button>
                                    </div>
                                </div>
                                <select multiple class="form-control" name="foundedMembers" id="foundedMembersNote">
                                </select>
                            </div>
                            <div class="col-md-6">
                                <h2>Membres</h2>
                                <div class="form-group col-md-2">
                                    <button type="button" class="btn btn-danger" id="removeMemberNote">Supprimer</button>
                                </div>
                                <select multiple class="form-control" name="members[]" id="members">
                                    <option value="{{ Auth::user()->id}}">{{ Auth::user()->name }}</option>
                                </select>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <h2>Recherche d'un groupe</h2>
                                <!-- Group search input-->
                                <div class="form-group col-md-6">
                                    <div class="col-md-10">
                                        <input id="searchGroupNote" name="searchGroupNote" type="search" placeholder="Nom du groupe" class="form-control input-md"/>
                                    </div>
                                    <div class="col-md-2">
                                        <button type="button" class="btn btn-success" id="addGroupNote">Ajouter</button>
                                    </div>
                                </div>
                                <select multiple class="form-control" name="foundedGroups" id="foundedGroupNote">
                                </select>
                            </div>
                            <div class="col-md-6">
                                <h2>Groupes</h2>
                                <div class="form-group col-md-2">
                                    <button type="button" class="btn btn-danger" id="removeGroupNote">Supprimer</button>
                                </div>
                                <select multiple class="form-control" name="groups[]" id="groups">

                                </select>
                            </div>
                        </div>
                      </br>
                        <div class="panel-footer">
                            <button type="submit" class="btn btn-primary" id="BtnNoteSave">Enregistrer</button>
                            <button href="notes" class="btn btn-default" id="BtnNoteSave">Annuler</button>
                        </div>
                    </div>
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
    //pour la rechercher d'utilisateurs
    $("#searchMemberNote").keyup(function () {
        var jqxhr = $.getJSON( "/searchusers", {'term' : $("#searchMemberNote").val()}, function(data) {
            $("#foundedMembersNote").empty();
            $.each(data, function (i, item) {
                $("#foundedMembersNote").append(new Option(item.name, item.id));
            });
        });
    });
    $("#addMemberNote").click(function(){
        var option = $("#foundedMembersNote option:selected");
        var exist = false;
        $('#members option').each(function(){
            if(this.value == option.val()) {
                exist = true;
            }
        });
        if(!exist) {
            $("#members").append(option);
        }
    });
    $("#removeMemberNote").click(function(){
        $("#members option:selected").remove();
    });

    $('#form_note').on('submit', function(){
        $('#members option').prop('selected', true);
    });
    //pour la recherche de groupes
    $("#searchGroupNote").keyup(function () {
        var jqxhr = $.getJSON( "/searchgroups", {'term' : $("#searchGroupNote").val()}, function(data) {
            $("#foundedGroupNote").empty();
            $.each(data, function (i, item) {
                $("#foundedGroupNote").append(new Option(item.name, item.id));
            });
        });
    });
    $("#addGroupNote").click(function(){
        var option = $("#foundedGroupNote option:selected");
        var exist = false;
        $('#groups option').each(function(){
            if(this.value == option.val()) {
                exist = true;
            }
        });
        if(!exist) {
            $("#groups").append(option);
        }
    });
    $("#removeGroupNote").click(function(){
        $("#groups option:selected").remove();
    });

    $('#form_note').on('submit', function(){
        $('#groups option').prop('selected', true);
    });
</script>
@endsection
