<script>
    function onLoad_overzicht(){
        angular.element(jQuery('#sort_team')[0]).scope().reload();
        angular.element(jQuery('#content_overzicht')[0]).scope().loadRegistrations();
    }
</script>
<div id="content_overzicht" ng-controller="registrationController" class="content_right">
    <div class="uk-text-lead headText app-headerbb">Overzicht uren</div>
    <div class="page-panelbb">
        <div class="page-panel-innerbb">
            <div class="page-panel-content maskablebb" id="dashboard-containerbb">
                <div id="dashboard-overviewbb" class="dashboard-sectionbb">
                    <form class="uk-form-horizontal" style="width: 100%; margin-bottom:10px;">
                        <div class="uk-grid">
                            <div class="uk-width-1-4">
                                <label id="filter-label" class="uk-form-label" for="sort_wnnr">Wanneer </label>
                                <div id="filter-controls" class="uk-form-controls">
                                    <select class="uk-select" id="sort_wnnr">
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
                            <div class="uk-width-1-4">
                                <label id="filter-label" class="uk-form-label" for="sort_cat">Categorie</label>
                                <div id="filter-controls" class="uk-form-controls">
                                    <select class="uk-select" id="sort_cat">
                                        <!-- Deze opties staan niet vast, moet samengaan met de categoriën die de gebruiker aangemaakt heeft -->
                                        <option>Alles</option>
                                        <option>Blauw</option>
                                        <option>Groen</option>
                                        <option>Zwart</option>
                                    </select>
                                </div>
                            </div>
                            <div class="uk-width-1-4">
                                <div class="uk-margin">
                                    <label id="filter-label" class="uk-form-label" for="sort_team">Team</label>
                                    <div id="filter-controls" class="uk-form-controls">
                                        <select id="sort_team" ng-controller="teamController" class="uk-select uk-form-width-large">
                                            <!-- Deze opties staan niet vast, moet samengaan met de teams waar de gebruiker in zit -->
                                            <option>Geen team</option>
                                            <option ng-repeat="team in teams">@{{team.name}}</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="uk-width-1-4">
                                <div class="uk-margin" >
                                    <button id="filter-button" class="uk-button uk-button-default">Filter</button>
                                </div>
                            </div>
                        </div>
                    </form>
                    <!-- Tabel -->
                    <table id="tabel-uren">
                        <thead>
                            <tr>
                                <th>Datum</th>
                                <th>Tijd</th>
                                <th>Categorie</th>
                                <th>Team</th>
                                <th>Omschrijving</th>
                                <th>Status</th>
                                <th>Opties</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr ng-repeat="registration in registrations">
                                <th>@{{registration.day}} - @{{registration.month}} - @{{registration.year}}</th>
                                <td>@{{registration.hours}}</td>
                                <td class="truncate">@{{registration.category_name}}</td>
                                <td class="truncate">@{{registration.team_name}}</td>
                                <td class="truncate">@{{registration.description}}</td>
                                <td>@{{registration.state}}</td>
                                <td><a class="uk-icon-button" uk-icon="icon:trash"></a><a href="#wijziguur" class="uk-icon-button navbarLink"uk-icon="icon:pencil"></a></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
