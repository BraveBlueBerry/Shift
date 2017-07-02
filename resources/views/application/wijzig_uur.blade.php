<div id="content_wijziguur" class="content_right">
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
                                            <textarea id="textarea_omschrijving" class="uk-textarea uk-form-width-large" rows="5" placeholder="Een korte omschrijving van de uitgevoerde werkzaamheden"></textarea>
                                        </div>
                                    </div>
                                    <!-- Categorie -->
                                    <div class="uk-margin">
                                        <label class="uk-form-label" for="options_cat">Categorie*</label>
                                        <div class="uk-form-controls">
                                            <select id="options_cat" class="uk-select uk-form-width-large">
                                                <option>Categorie 01</option>
                                                <option>Categorie 02</option>
                                            </select>
                                        </div>
                                    </div>
                                    <!-- Datum -->
                                    <div class="uk-margin">
                                        <label class="uk-form-label" for="datum_gewerkt">Datum*</label>
                                        <div class="uk-form-controls">
                                            <input id="datum_gewerkt" type="date" placeholder="dd-mm-jjjj"/>
                                        </div>
                                    </div>
                                    <!-- Hoe lang -->
                                    <div class="uk-margin">
                                        <label class="uk-form-label" for="tijd_gewerkt">Hoe lang aan gewerkt?*</label>
                                        <div class="uk-form-controls">
                                            <input id="tijd_gewerkt" class="uk-input uk-form-width-large" type="text" placeholder="bv: 1,5"/>
                                        </div>
                                    </div>
                                    <!-- Team (optioneel) -->
                                    <div class="uk-margin">
                                        <label class="uk-form-label" for="options_team">Team</label>
                                        <div class="uk-form-controls">
                                            <select id="options_team" class="uk-select uk-form-width-large">
                                                <option>Team 01</option>
                                                <option>Team 02</option>
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
