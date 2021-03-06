<div id="content_maakteam" class="content_right">
    <div class="uk-text-lead headText app-headerbb">Nieuw team</div>
    <div class="page-panelbb">
        <div class="page-panel-innerbb">
            <div class="page-panel-content maskablebb" id="dashboard-containerbb">
                <div id="dashboard-overviewbb" class="dashboard-sectionbb">
                    <div class="dashboard-overviewbb">

                        <form ng-controller="teamController" ng-submit='makeTeam()' class="uk-form-horizontal">
                            <fieldset class="uk-fieldset">
                                <!-- Naam team -->
                                <div class="uk-margin">
                                    <label class="uk-form-label" for="naam_team">Naam team*</label>
                                    <div class="uk-form-controls">
                                        <input id="naam_team" class="uk-input uk-form-width-large" ng-model='make_team_name' type="text" placeholder="bv: Webapplicatie Fietsverkoop"/>
                                    </div>
                                </div>
                                <!-- color -->
                                <div class="uk-margin">
                                    <label class="uk-form-label" for="color_team">Kleur*</label>
                                    <div class="uk-form-controls">
                                        <input id="color_team" ng-model='make_team_colour' value="#000000" class="uk-input uk-form-width-large" type="color"/>
                                    </div>
                                </div>
                                <!-- Submit knop -->
                                <div class="uk-margin" >
                                    <input type='submit' value='Opslaan' class="uk-button uk-button-default" />
                                </div>
                            </fieldset>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
