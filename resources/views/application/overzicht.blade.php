<div id="contentbb_overzicht">
    <div class="uk-text-lead headText app-headerbb">Overzicht uren</div>
    <div class="page-panelbb">
        <div class="page-panel-innerbb">
            <div class="page-panel-contentbb maskablebb" id="dashboard-containerbb">
                <div id="dashboard-overviewbb" class="dashboard-sectionbb">
                    <div class="dashboard-overviewbb">
                        <form class="uk-form-horizontal uk-margin-large" style="width: 100%;">
                            <div class="uk-margin">

                                <div class="left">

                                    <label class="uk-form-label" for="form-horizontal-select">Wanneer </label>
                                    <div class="uk-form-controls">
                                        <select class="uk-select" id="form-horizontal-select">
                                            <!-- Deze opties staan niet vast, misschien moeten we juist data kiezen die gebruikt zijn in de geregistreerde uren
                                                  Datepicker van maken met opties "van" en "tot" -->
                                            <option>Alles</option>
                                            <option>Vandaag</option>
                                            <option>Afgelopen week</option>
                                            <option>Afgelopen 2 weken</option>
                                            <option>Afgelopen maand</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="right" style="margin-left:20px;">

                                    <label class="uk-form-label" for="form-horizontal-select">Categorie</label>
                                    <div class="uk-form-controls">
                                        <select class="uk-select" id="form-horizontal-select">
                                            <!-- Deze opties staan niet vast, moet samengaan met de categoriën die de gebruiker aangemaakt heeft -->
                                            <option>Alles</option>
                                            <option>Blauw</option>
                                            <option>Groen</option>
                                            <option>Zwart</option>
                                        </select>
                                    </div>

                                </div>

                            </div>
                            <br/> <br/> <br/>
<!--                            tabel import-->
                            @include('application.table.table')
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
