<script>
    function onLoad_teamoverzicht(loc){
        angular.element(jQuery('#content_teamoverzicht')[0]).scope().loadEdit(loc[1]);
        angular.element(jQuery('#tabel-uren2')[0]).scope().loadRegistrationsForTeam(loc[1]);
    }
</script>
<div id="content_teamoverzicht" ng-controller="teamController" class="content_right">
    <div class="uk-text-lead headText app-headerbb">Overzicht uren van @{{active_team.name}}</div>
    <div class="page-panelbb">
        <div class="page-panel-innerbb">
            <div class="page-panel-content maskablebb" id="dashboard-containerbb">
                <div id="dashboard-overviewbb" class="dashboard-sectionbb">
                    <form class="uk-form-horizontal" style="width: 100%; margin-bottom:10px;">
                        <div class="uk-grid">
                            <!-- Dropdown voor filter op datum -->
                            <div class="uk-width-1-3">
                                <label id="filter-label" class="uk-form-label" for="sort_wnnr">Wanneer </label>
                                <div id="filter-controls" class="uk-form-controls">
                                    <select class="uk-select" id="sort_wnnr">
                                        <option>Alles</option>
                                        <option>Vandaag</option>
                                        <option>Afgelopen week</option>
                                        <option>Afgelopen 2 weken</option>
                                        <option>Afgelopen maand</option>
                                    </select>
                                </div>
                            </div>
                            <!-- Dropdown voor filter op Categorie -->
                            <div class="uk-width-1-3">
                                <label id="filter-label" class="uk-form-label" for="sort_cat">Categorie</label>
                                <div id="filter-controls" class="uk-form-controls">
                                    <select class="uk-select" id="sort_cat">
                                        <option>Alles</option>
                                        <option>Blauw</option>
                                        <option>Groen</option>
                                        <option>Zwart</option>
                                    </select>
                                </div>
                            </div>
                            <!-- Filter knop -->
                            <div class="uk-width-1-3">
                                <div class="uk-margin" >
                                    <button id="filter-button" class="uk-button uk-button-default">Filter</button>
                                </div>
                            </div>
                        </div>
                    </form>
                    <!-- Tabel -->
                    <table ng-controller="registrationController" id="tabel-uren2">
                        <thead>
                            <tr>
                                <th>Datum</th>
                                <th>Tijd</th>
                                <th>Wie</th>
                                <th>Categorie</th>
                                <th>Omschrijving</th>
                                <th>Status</th>
                                <th>Opties</th>
                            </tr>
                        </thead>
                        <tbody>
                            <!-- empty row -->
                            <tr ng-repeat="registration in registrations">
                                <th style="background-color:@{{registration.category_colour}};">@{{registration.day}} - @{{registration.month}} - @{{registration.year}}</th>
                                <td>@{{registration.hours}}</td>
                                <td>@{{registration.user}}</td>
                                <td class="truncate">@{{registration.category_name}}</td>
                                <td class="truncate">@{{registration.description}}</td>
                                <td>@{{registration.status}}</td>
                                <td><a class="uk-icon-button" uk-icon="icon:trash"></a><a href="#wijziguur" class="uk-icon-button navbarLink"uk-icon="icon:pencil"></a></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
