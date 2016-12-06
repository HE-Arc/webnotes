<h1>Paramètre du compte</h1>
<p>Cette section vous permet de modifier les champs que vous désirez: </p>
<form action="{{ url("/account/.Auth::user->id") }}">
    {{ csrf_field() }}
    {{ method_field('PATCH') }}
    <h2>Changement de nom d'utilisateur</h2>
    <div class="form-group">
        <label for="newPass">Nouveau nom d'utilisateur: </label>
        <input type="text" id="newPass" class="form-control" name="">
    </div>
    <h2>Changement de mot de passe</h2>
    <div class="form-group">
        <label for="newPass">Nouveau mot de passe: </label>
        <input type="password" id="newPass" class="form-control" name=""/>
    </div>
    <div class="form-group">
        <label for="newPass2">Confirmer nouveau mot de passe: </label>
        <input type="password" id="newPass2" class="form-control" name=""/>
    </div>
    <div class="form-group">
        <label for="oldPass">Entrez l'ancien mot de passe: </label>
        <input type="password" id="oldPass" class="form-control" name=""/>
    </div>
    <h2>Changement d'adresse mail</h2>
    <div class="form-group">
        <label for="mail">Nouvel email: </label>
        <input type="email" id="mail" class="form-control" name="">
    </div>
    <button type="submit" class="btn btn-default">Valider</button>
</form>
