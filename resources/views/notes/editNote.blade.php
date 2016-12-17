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
                <form action="{{ url("/notes/".$note->id) }}" method="post">
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
                    </div>

                    <div class="panel-footer">
                        <button type="submit" class="btn btn-primary" id="BtnNoteSave">Enregistrer</button>
                        <button class="btn btn-default">Annuler</button>
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
