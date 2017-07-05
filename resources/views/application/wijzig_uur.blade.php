<script>
    function onLoad_wijziguur(loc){
        angular.element(jQuery('#options_edituur_team2')[0]).scope().reload();
        angular.element(jQuery('#content_wijziguur')[0]).scope().loadEditRegistration(loc[1]);
    }
</script>
<div id="content_wijziguur" ng-controller="registrationController" class="content_right">
    <div class="uk-text-lead headText app-headerbb">Registratie aanpassen</div>
    <div class="page-panelbb">
        <div class="page-panel-innerbb">
            <div class="page-panel-content maskablebb" id="dashboard-containerbb">
                <div id="dashboard-overviewbb" class="dashboard-sectionbb">
                    <div class="dashboard-overviewbb">
                        <section class="dashboard-left-content">
                            <span uk-icon="icon:file-edit; ratio:6;" style="margin-top:100px;"></span><br /><br />
                            <br />
                            Hier kun je de registratie aanpassen
                        </section>
                        <section class="dashboard-right-content">
                            <form id="form-account" class="uk-form-horizontal">
                                <fieldset class="uk-fieldset">
                                    <!-- Omschrijving -->
                                    <div class="uk-margin">
                                        <label class="uk-form-label" for="textarea_omschrijving">Omschrijving*</label>
                                        <div class="uk-form-controls">
                                            <textarea id="textarea_omschrijving" ng-model='edit_registration_description' class="uk-textarea uk-form-width-large" rows="5" placeholder="Een korte omschrijving van de uitgevoerde werkzaamheden"></textarea>
                                        </div>
                                    </div>
                                    <!-- Datum -->
                                    <div class="uk-margin">
                                        <label class="uk-form-label" for="datum_gewerkt">Datum*</label>
                                        <div class="uk-form-controls">
                                            <input id="datum_gewerkt" ng-model="edit_registration_date" type="date" placeholder="dd-mm-jjjj"/>
                                        </div>
                                    </div>
                                    <!-- Hoe lang -->
                                    <div class="uk-margin">
                                        <label class="uk-form-label" for="tijd_gewerkt">Hoe lang aan gewerkt?*</label>
                                        <div class="uk-form-controls">
                                            <input id="tijd_gewerkt" ng-model="edit_registration_hours" class="uk-input uk-form-width-large" type="text" placeholder="bv: 1,5"/>
                                        </div>
                                    </div>
                                    <!-- Team -->
                                    <div class="uk-margin">
                                        <label class="uk-form-label" for="options_edituur_team2">Team</label>
                                        <div class="uk-form-controls">
                                            <select id="options_edituur_team2" ng-options="team as team.name for team in teams" ng-controller="teamController" ng-model="$parent.team" ng-change="$parent.changeTeam()" class="uk-select uk-form-width-large">
                                                <option value="">Geen team</option>
                                            </select>
                                        </div>
                                    </div>
                                    <!-- Categorie -->
                                    <div class="uk-margin">
                                        <label class="uk-form-label" for="options_cat">Categorie*</label>
                                        <div class="uk-form-controls">
                                            <select id="options_cat" ng-options="category as category.name for category in categories" ng-model="select_category" class="uk-select uk-form-width-large">
                                                <option value="">Selecteer een categorie</option>
                                            </select>
                                        </div>
                                    </div>
                                    <!-- Bijlage (optioneel) -->
                                    <div class="uk-margin" >
                                        <div uk-form-custom>
                                            <label class="uk-form-label" for="bijlage_submit">Bijlage</label>
                                            <div class="uk-form-controls">
                                                <input type="file">
                                                <button class="uk-button uk-button-default" type="button" tabindex="-1">Select</button>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Submit knop -->
                                    <div class="uk-margin" >
                                        <button id="submit-button" class="uk-button uk-button-default">Wijzigingen opslaan</button>
                                    </div>
                                </fieldset>
                            </form>
                        </section>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
