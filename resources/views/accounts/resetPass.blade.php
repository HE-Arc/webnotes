<h1>Changement du mot de passe du compte de  {{ Auth::user()->name }}</h1>
<p>Cette section vous permet de modifier votre mot de passe: </p>
<form action="{{ url("/account/passUpdate/".Auth::user()->id) }}" method="post" id="formReset" enctype="multipart/form-data">
    {{ csrf_field() }}
    {{ method_field('PATCH') }}
    <h2>Nouveau mot de passe:</h2>
    <div class="form-group">
        <label for="newPass1">Nouveau mot de passe: </label>
        <input type="password" id="newPass1" class="form-control" name="password">
    </div>
    <h2>Retaper le nouveau mot de passe:</h2>
    <div class="form-group">
        <label for="newPass2">Nouveau mot de passe: </label>
        <input type="password" id="newPass2" class="form-control" name="password1">
    </div>
    <h2>Changement d'adresse mail</h2>
    <div class="form-group">
        <label for="pass">Ancien mot de passe: </label>
        <input type="password" id="pass" class="form-control" name="pass">
    </div>
    <button type="submit" class="btn btn-info btn-lg" id="valid">Valider</button>
</form>

<script>
    $("#formReset").on('submit', function(e){
        if($("#newPass1").val() == '' || $("#newPass2").val() == '' || $("#pass").val() == ''){
            alert('Tous les champs doivent être renseignés');
            $("#newPass1").focus();
            e.preventDefault();
            return;
        }
        if($("#newPass1").val() != $("#newPass2").val()){
            alert('Les nouveaux mots de passe doivent être égaux')
            $("#newPass1").focus();
            e.preventDefault();
        }
    });
</script>