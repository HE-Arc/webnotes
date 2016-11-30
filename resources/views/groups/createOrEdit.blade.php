@extends('layouts.app')

@section('title')
    {{ $title }}
@endsection

@section('header')
@endsection

@section('content')
    <div class="container">
        <div class="panel panel-default">
            <form class="form-horizontal" action="{{url("/group")}}" method="post" enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="panel-heading">
                    <h1>{{ $title }}</h1>
                </div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-md-6">
                            <!-- Icon file button -->
                            <div class="form-group" style="text-align: center;">
                                <div class="input-group-btn">
                                    <img id="group-icon-edit" src="{{ Storage::url('groups_icon/group_default.png') }}" alt="Group Icon" class="img-circle" title="Cliquer pour changer d'image" width="150" height="150">
                                    <input id="group-input-icon-edit" name="icon" class="input-file" type="file" accept="image/png, image/jpeg, image/gif"/>
                                </div>
                            </div>
                            <!-- Name text input-->
                            <div class="form-group">
                                <label class="col-md-4 control-label" for="name">Nom du groupe</label>
                                <div class="col-md-5">
                                    <input id="name" name="name" type="text" placeholder="Nom" class="form-control input-md" required="" value="{{ $group->name }}">
                                </div>
                            </div>
                            <!-- Description textarea -->
                            <div class="form-group">
                                <label class="col-md-4 control-label" for="description">Description</label>
                                <div class="col-md-5">
                                    <textarea class="form-control " id="description" name="description">{{ $group->description }}</textarea>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <h2>Membres</h2>
                            <!-- Member search input-->
                            <div class="form-group">
                                <label class="col-md-4 control-label" for="searchMember">Rechercher</label>
                                <div class="col-md-5">
                                    <input id="searchMember" name="searchMember" type="search" placeholder="Nom de l'utilisateur" class="form-control input-md">
                                </div>
                            </div>
                            <select multiple class="form-control">
                                @foreach($group->members as $member)
                                    <option value="{{ $member->id }}">{{ $member->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
                <div class="panel-footer">
                    <!-- Button (Double) -->
                    <div class="form-group text-right">
                        <div class="col-md-12">
                            <button id="save" name="save" class="btn btn-primary">Sauvegarder</button>
                            <a class="btn btn-default" href="{{ url('/group') }}" role="button">Annuler</a>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <script>
        $(function() {
            $("#group-icon-edit").click(function () {
                $("#group-input-icon-edit input:file").click();
            });
            // Create the preview image
            $("#group-input-icon-edit input:file").change(function (){
                var img = $('.img-circle');
                var file = this.files[0];
                var reader = new FileReader();
                // Set preview image into the popover data-content
                reader.onload = function (e) {
                    img.attr('src', e.target.result);
                }
                reader.readAsDataURL(file);
            });
        });
    </script>
@endsection