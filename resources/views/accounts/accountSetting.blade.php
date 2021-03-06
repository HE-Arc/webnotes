<h1>Paramètre du compte {{ Auth::user()->name }}</h1>
<p>Cette section vous permet de modifier les champs que vous désirez: </p>
<form action="{{ url("/account/".Auth::user()->id) }}" class="form-horizontal" method="post" enctype="multipart/form-data">
    {{ csrf_field() }}
    {{ method_field('PATCH') }}
    <h2>Changement d'image utilisateur</h2>
    <div class="form-group" style="text-align: center;">
        <div class="input_btn">
            <img id="icon-edit" src="{{ Storage::disk('public')->url(Auth::user()->avatar) }}" alt="Avatar" class="img-circle" title="Cliquer pour changer d'image" width="200" height="200"/>
            <input id="input-icon-edit" name="avatar" class="input-file" type="file" accept="image/png, image/jpeg, image/gif"/>
            <p>Cliquez sur l'image pour la modifier</p>
        </div>
    </div>
    <h2>Changement de nom d'utilisateur</h2>
    <div class="form-group">
        <label for="newPass">Nouveau nom d'utilisateur: </label>
        <input type="text" id="newPass" class="form-control" name="name" value="{{ Auth::user()->name }}"/>
    </div>
    <h2>Changement d'adresse mail</h2>
    <div class="form-group">
        <label for="mail">Nouvel email: </label>
        <input type="email" id="mail" class="form-control" name="email" value="{{ Auth::user()->email }}"/>
        <p>La modification de l'adresse e-mail modifie également votre login</p>
    </div>
    <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal" id="valid">Valider</button>

    <!-- Modal -->
    <div id="myModal" class="modal fade" role="dialog">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Attention</h4>
                </div>
                <div class="modal-body">
                    <p>Voulez vous vraiment remplacer ces infos ?</p>
                    <p>Si votre e-mail a été modifié, vos logins auront changé !</p>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-default">Valider</button>
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                </div>
            </div>

        </div>
    </div>
</form>
<script>
    /* ICON UPLOADER */
    $("#icon-edit").click(function () {
        $("#input-icon-edit").click();
    });
    // Create the preview image
    $("#input-icon-edit").change(function (){
        var img = $('#icon-edit');
        var file = this.files[0];
        var reader = new FileReader();
        // Set preview image into the popover data-content
        reader.onload = function (e) {
            img.attr('src', e.target.result);
        };
        reader.readAsDataURL(file);
    });
</script>
