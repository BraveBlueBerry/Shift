<script>
    function onLoad_maakcat(){
        angular.element(jQuery('#options_team2')[0]).scope().getOwnedTeams();
        angular.element(jQuery('#content_maakcat')[0]).scope().get();
    }
</script>
<div id="content_maakcat" class="content_right" ng-controller="categoryController">
    <div class="uk-text-lead headText app-headerbb">Nieuwe categorie</div>
    <div class="page-panelbb">
        <div class="page-panel-innerbb">
            <div class="page-panel-content maskablebb" id="dashboard-containerbb">
                <div id="dashboard-overviewbb" class="dashboard-sectionbb">
                    <div class="dashboard-overviewbb">

                        <form class="uk-form-horizontal">
                            <fieldset class="uk-fieldset">
                                <!-- Naam categorie -->
                                <div class="uk-margin">
                                    <label class="uk-form-label" for="naam_categorie">Naam categorie</label>
                                    <div class="uk-form-controls">
                                        <input id="naam_categorie" class="uk-input uk-form-width-large" ng-model="name" type="text" placeholder="bv: Webapplicatie Fietsverkoop"/>
                                    </div>
                                </div>
                                <!-- color -->
                                <div class="uk-margin">
                                    <label class="uk-form-label" for="color_team">Kleur*</label>
                                    <div class="uk-form-controls">
                                        <input id="color_team" ng-model="colour" class="uk-input uk-form-width-large" type="color"/>
                                    </div>
                                </div>
                                <!-- Team -->
                                <div class="uk-margin">
                                    <label class="uk-form-label" for="options_team">Team</label>
                                    <div class="uk-form-controls">
                                        <select id="options_team2" ng-init="none" ng-model="$parent.team" ng-controller="teamController" class="uk-select uk-form-width-large">
                                            <option ng-value="none">Geen team</option>
                                            <option ng-repeat="team in owned_teams" value="@{{team.id}}">@{{team.name}}</option>
                                        </select>
                                    </div>
                                </div>
                                <!-- Submit knop -->
                                <div class="uk-margin" >
                                    <button ng-click="submit()" class="uk-button uk-button-default">Submit</button>
                                </div>
                            </fieldset>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
