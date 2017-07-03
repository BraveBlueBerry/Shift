<script>
    function onLoad_wijzigteam(data){
        angular.element(jQuery('#content_wijzigteam')[0]).scope().loadEdit(data[1]);
    }
</script>
<div id="content_wijzigteam" ng-controller="teamController" class="content_right">
    <div class="uk-text-lead headText app-headerbb">Team @{{active_team.name}} aanpassen</div>
    <div class="page-panelbb">
        <div class="page-panel-innerbb">
            <div class="page-panel-content maskablebb" id="dashboard-containerbb">
                <div id="dashboard-overviewbb" class="dashboard-sectionbb">
                    <div class="dashboard-overviewbb">
                        <section class="dashboard-left-content">
                            <!--
                            <span uk-icon="icon:file-edit; ratio:6;" style="margin-top:100px;"></span><br /><br />
                            <br />
                            Hier kun je een team aanpassen
                            -->
                            <br />
                            Gegevens van een team wijzigen
                            <form id="form-wijzigteam" ng-controller="teamController" ng-submit='editTeam()'class="uk-form-horizontal">
                                <fieldset class="uk-fieldset">
                                    <!-- Naam team -->
                                    <div class="uk-margin">
                                        <label id="filter-label" class="uk-form-label" for="naam_team">Naam team*</label>
                                        <div id="filter-controls" class="uk-form-controls">
                                            <input id="naam_team" ng-model='edit_team_name' class="uk-input uk-form-width-medium" type="text" placeholder="bv: DevTeam"/>
                                        </div>
                                    </div>
                                    <!-- color -->
                                    <div class="uk-margin">
                                        <label id="filter-label" class="uk-form-label" for="color_team">Kleur*</label>
                                        <div id="filter-controls" class="uk-form-controls">
                                            <input id="color_team" ng-model='edit_team_colour' class="uk-input uk-form-width-medium" type="color"/>
                                        </div>
                                    </div>
                                    <!-- Submit knop -->
                                    <div class="uk-margin" >
                                        <input type="submit" id="submit-button" value="Wijzigingen opslaan" class="uk-button uk-button-default"></button>
                                    </div>
                                </fieldset>
                            </form>

                        </section>
                        <section class="dashboard-right-content">
                            <br />
                            Overzicht van alle leden en de optie om leden te verwijderen <br />
                            <div ng-if="members_active_team.length == 0 && loaded == true">
                                <img class="uk-align-center" width="180" height="165" src="{{url('storage/logozwartwit.png')}}" alt="">
                                Op het moment zijn er geen andere leden in jouw team. <br /> Wil je een lid toevoegen?
                                <a class="navbarLink" href="#invite">Dat kan hier</a>
                            </div>
                            <div ng-if="members_active_team.length != 0 && loaded == true">
                                <table id="tabel-members">
                                    <thead>
                                        <tr>
                                            <th>Naam</th>
                                            <th>Email</th>
                                            <th>Uren gewerkt</th>
                                            <th>Opties</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <!-- Empty row -->
                                        <tr ng-repeat="member in members_active_team">
                                            <th>@{{member.first_name}} @{{member.last_name}}</th>
                                            <td>@{{member.email}}</td>
                                            <td></td>
                                            <td><a href="#modal-verwijdermember" uk-toggle ng-click="setMemberToBeDeleted(member)" class="uk-icon-button" uk-icon="icon:trash"></a>
                                                <div id="modal-verwijdermember" uk-modal>
                                                    <div class="uk-modal-dialog uk-modal-body">
                                                        <h2 class="uk-modal-title">Lid verwijderen</h2>
                                                        <p>Weet je zeker dat je @{{current_member.first_name}} wilt verwijderen uit @{{active_team.name}}?</p>
                                                        <p class="uk-text-right">
                                                            <button class="uk-button uk-button-default uk-modal-close" type="button">Annuleren</button>
                                                            <button class="modal-button-cheat uk-button uk-button-danger" type="button">Verwijder</button>
                                                        </p>
                                                    </div>
                                                </div>
                                            </td>

                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <div ng-if="loaded == false">
                                <img src={{url('storage/spinner.gif')}} width="100" height="100" style="margin-top:100px;"/>
                            </div>
                        </section>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
