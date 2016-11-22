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
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <form>
                    <div class="panel-heading">
                        <div class="form-group">
                            <label for="NoteTitle">Titre</label>
                            <input type="text" class="form-control" placeholder="Titre" id="NoteTitle" >
                        </div>

                        <div class="form-group">
                            <label for="NoteTitle">Description</label>
                            <textarea class="form-control" rows="3" placeholder="Description" id="NoteDescription" ></textarea>
                        </div>
                    </div>

                    <div class="panel-body">
                        <div class="form-group">

                            <label for="NoteContent">Contenu</label>
                            <textarea id="NoteContent"></textarea>
                        </div>
                    </div>

                    <div class="panel-footer">
                        <button type="submit" class="btn btn-primary" id="BtnNoteSave">Enregistrer</button>
                        <button type="submit" class="btn btn-default" id="BtnNoteSave">Annuler</button>
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
</script>
@endsection
