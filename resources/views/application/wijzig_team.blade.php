<script>
    function onLoad_wijzigteam(data){
        angular.element(jQuery('#content_wijzigteam')[0]).scope().loadEdit(data[1]);
    }
</script>
<div id="content_wijzigteam" ng-controller="teamController" class="content_right">
    <div class="uk-text-lead headText app-headerbb">Team aanpassen</div>
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
                                            <input id="naam_team" ng-model='make_team_name' ng-init="make_team_name=@{{active_team.name}}" class="uk-input uk-form-width-medium" type="text" placeholder="bv: DevTeam"/>
                                        </div>
                                    </div>
                                    <!-- color -->
                                    <div class="uk-margin">
                                        <label id="filter-label" class="uk-form-label" for="color_team">Kleur*</label>
                                        <div id="filter-controls" class="uk-form-controls">
                                            <input id="color_team" ng-model='make_team_colour' class="uk-input uk-form-width-medium" value="@{{active_team.colour}}" type="color"/>
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
                            Overzicht van alle leden en de optie om leden te verwijderen
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
                                    <tr ng-repeat="">
                                        <th class="truncate"></th>
                                        <td></td>
                                        <td></td>
                                        <td><a class="uk-icon-button" uk-icon="icon:trash"></a></td>
                                    </tr>
                                </tbody>
                            </table>
                        </section>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
