<h1>Paramètre du compte {{ Auth::user()->name }}</h1>
<p>Cette section vous permet de modifier les champs que vous désirez: </p>
<form action="{{ url("/account/".Auth::user()->id) }}" method="post" enctype="multipart/form-data">
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
    </div>
    <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal" id="valid">Valider</button>

    {{--<!-- Modal -->--}}
    <div id="myModal" class="modal fade" role="dialog">
        <div class="modal-dialog">

            {{--<!-- Modal content-->--}}
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Modal Header</h4>
                </div>
                <div class="modal-body">
                    <p>Voulez vous vraiment remplacer ces infos ?</p>
                    <p>Attention la modification de votre e-mail modifiera également vos logins !</p>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-default">Valider</button>
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                </div>
            </div>

        </div>
    </div>
</form>

