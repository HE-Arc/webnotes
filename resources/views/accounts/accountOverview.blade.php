<h1>Apercu du compte de {{ $user->name }}</h1>
<h2>Dernière note utilisé</h2>
<div class="panel panel-default group-profile">
    <div class="panel-body">
        <div class="well">
            @if(count($user->notes) > 0)
                <strong>Titre et description de la dernière note:</strong>
                <div class="panel-heading">
                    <h3>
                        {{ $user->notes()->orderBy('updated_at', 'desc')->first()->releases()->first()->title }}<br/>
                        <small>{{ $user->notes()->orderBy('updated_at', 'desc')->first()->releases()->first()->description }}</small><br/>
                    </h3>
                </div>
                <strong>Vous avez écrit {{count($user->notes)}} note(s)</strong>
            @else
                Vous n'avez pas encore rédigé de note !
            @endif
        </div>
    </div>
    <div class="panel-footer">
        <div class="row">
            <div class="col-md-6">
                <a class="btn btn-primary" href="{{ url('/notes') }}" role="button"> Voir la liste de mes notes</a>
            </div>
        </div>
    </div>
</div>

<h2>Dernière activité de groupe </h2>
<div class="panel panel-default group-profile">
    <div class="panel-body">
        <div class="well">
            @if(count($user->groups) > 0)
                <strong>Nom et description du dernier groupe rejoint:</strong>
                <div class="panel-heading">
                    <h3>
                        {{ $user->groups()->orderBy('updated_at', 'desc')->first()->name }}<br/>
                        <small>{{ $user->groups()->orderBy('updated_at', 'desc')->first()->description }}</small>
                    </h3>
                </div>
                <strong>Vous êtes inscrit dans {{count($user->groups)}} groupe(s)</strong>
            @else
                Vous n'avez pas encore rejoins de groupe !
            @endif
        </div>
    </div>
    <div class="panel-footer">
        <div class="row">
            <div class="col-md-6">
                <a class="btn btn-primary" href="{{ url('/group') }}" role="button"> Voir la liste de mes groupes</a>
            </div>
        </div>
    </div>
</div>
