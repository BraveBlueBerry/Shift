<div id="content_wijzigteam" class="content_right">
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
                            <form id="form-wijzigteam" class="uk-form-horizontal">
                                <fieldset class="uk-fieldset">
                                    <!-- Naam team -->
                                    <div class="uk-margin">
                                        <label id="filter-label" class="uk-form-label" for="naam_team">Naam team*</label>
                                        <div id="filter-controls" class="uk-form-controls">
                                            <input id="naam_team" class="uk-input uk-form-width-medium" type="text" placeholder="bv: DevTeam"/>
                                        </div>
                                    </div>
                                    <!-- color -->
                                    <div class="uk-margin">
                                        <label id="filter-label" class="uk-form-label" for="color_team">Kleur*</label>
                                        <div id="filter-controls" class="uk-form-controls">
                                            <input id="color_team" class="uk-input uk-form-width-medium" type="color"/>
                                        </div>
                                    </div>
                                    <!-- Submit knop -->
                                    <div class="uk-margin" >
                                        <button id="submit-button" class="uk-button uk-button-default">Wijzigingen opslaan</button>
                                    </div>
                                </fieldset>
                            </form>

                        </section>
                        <section class="dashboard-right-content">
                            <br />
                            Overzicht van alle leden en de optie om leden te verwijderen
                            @include('application.table.table_members')

                        </section>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
