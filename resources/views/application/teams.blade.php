<script>
    function onLoad_teams(){
        angular.element(jQuery('#content_teams')[0]).scope().reload();
    }
</script>
<div id="content_teams" ng-controller="teamController" class="content_right">
    <div class="uk-text-lead headText app-headerbb">Overzicht teams</div>
    <div class="page-panelbb">
        <div class="page-panel-innerbb">
            <div class="page-panel-content maskablebb" id="dashboard-containerbb">
                <div id="dashboard-overviewbb" class="dashboard-sectionbb">
                    <div class="dashboard-overviewbb">
                        <section class="dashboard-left-content">
                            <i class="fa fa-users fa-5x" style="margin-top:100px;"></i> <br/> <br/>
                            Welkom op de team pagina!
                        </section>
                        <section class="dashboard-right-content">
                            <div ng-if="loaded == false">
                                <img src={{url('storage/spinner.gif')}} width="100" height="100" style="margin-top:100px;"/>
                            </div>
                            <div ng-if="teams.length == 0 && loaded == true">
                                <img class="uk-align-center" width="180" height="165" src="{{url('storage/logozwartwit.png')}}" alt="">
                                Op het moment zijn er nog geen teams waarin je zit. <br /> Wil je een team toevoegen?
                                <a class="navbarLink" href="#maakteam">Dat kan hier</a>
                            </div>
                            <div ng-if="teams.length != 0 && loaded == true">
                                <table id="tabel-teams">
                                    <thead>
                                        <tr>
                                            <th>Naam</th>
                                            <th>Aantal leden</th>
                                            <th>Uren samen gewerkt</th>
                                            <th>Opties</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr ng-repeat='team in teams'>
                                            <th class="truncate" style="background-color:@{{team.colour}}">@{{team.name}}</th>
                                            <td>@{{team.members}}</td>
                                            <td>0</td>
                                            <td>
                                                <a href="#modal-verwijderteam" ng-click="setTeamToBeDeleted(team.id)" uk-toggle class="uk-icon-button trash-team-button" uk-icon="icon:trash"></a>
                                                <a ng-if="team.owner == {{$user->id}}" href="#wijzigteam-@{{team.id}}" class="uk-icon-button navbarLink" uk-icon="icon:pencil"></a>
                                                <a ng-if="team.owner == {{$user->id}}" href="#addmember-@{{team.id}}" class="navbarLink" ><i class="fa fa-user-plus uk-icon-button"  aria-hidden="true"></i></a>
                                                <div id="modal-verwijderteam" uk-modal>
                                                    <div class="uk-modal-dialog uk-modal-body">
                                                        <h2 class="uk-modal-title">Verwijder @{{team.name}}</h2>
                                                        <p>Weet je zeker dat je @{{team.name}} wilt verwijderen?</p>
                                                        <p class="uk-text-right">
                                                            <button class="uk-button uk-button-default uk-modal-close" type="button">Annuleren</button>
                                                            <button class="modal-button-cheat uk-button uk-modal-close uk-button-danger" type="button">Verwijder</button>
                                                        </p>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </section>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
