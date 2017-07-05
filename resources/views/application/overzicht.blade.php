<script>
    function onLoad_overzicht(){
        angular.element(jQuery('#sort_team')[0]).scope().reload();
        angular.element(jQuery('#content_overzicht')[0]).scope().loadRegistrations();
        angular.element(jQuery('#sort_cat')[0]).scope().loadRegistrations();
    }
</script>
<div id="content_overzicht" ng-controller="registrationController" class="content_right">
    <div class="uk-text-lead headText app-headerbb">Overzicht uren</div>
    <div class="page-panelbb">
        <div class="page-panel-innerbb">
            <div class="page-panel-content maskablebb" id="dashboard-containerbb">
                <div id="dashboard-overviewbb" class="dashboard-sectionbb">
                    <form class="uk-form-horizontal" ng-controller="registrationController" ng-submit="filterRegistrations()" style="width: 100%; margin-bottom:10px;">
                        <div class="uk-grid">
                            <!-- Dropdown voor filter op datum -->
                            <div class="uk-width-1-4">
                                <label id="filter-label" class="uk-form-label" for="sort_wnnr">Wanneer </label>
                                <div id="filter-controls" class="uk-form-controls">
                                    <select class="uk-select" ng-model="time_select" id="sort_wnnr">
                                        <option value="">Alles</option>
                                        <option value="24">Afgelopen 24 uur</option>
                                        <option value="168">Afgelopen week</option>
                                        <option value="336">Afgelopen 2 weken</option>
                                        <option value="732">Afgelopen maand</option>
                                    </select>
                                </div>
                            </div>
                            <!-- Dropdown voor filter op Categorie -->
                            <div class="uk-width-1-4">
                                <label id="filter-label" class="uk-form-label" for="sort_cat">Categorie</label>
                                <div id="filter-controls" class="uk-form-controls">
                                    <select class="uk-select" id="sort_cat" ng-options="cat as cat.name for cat in categories" ng-controller="registrationController" ng-model="$parent.filter_cat_select" ng-change="$parent.changeFilter()">
                                        <option value="">Alles</option>
                                    </select>
                                </div>
                            </div>
                            <!-- Dropdown voor filter op Team -->
                            <div class="uk-width-1-4">
                                <div class="uk-margin">
                                    <label id="filter-label" class="uk-form-label" for="sort_team">Team</label>
                                    <div id="filter-controls" class="uk-form-controls">
                                        <select id="sort_team" ng-model="$parent.filter_team_select" ng-change="$parent.changeFilter()" ng-options="team as team.name for team in teams" ng-controller="teamController" class="uk-select uk-form-width-large">
                                            <option value="">Alles</option>
                                            <!-- <option>Geen team</option>
                                            <option ng-repeat="team in teams">@{{team.name}}</option> -->
                                        </select>
                                    </div>
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
                            <tr ng-repeat="registration in registrations | filter: filterRegistrations">
                                <th style="background-color:@{{registration.category_colour}}; background-image:linear-gradient( to right, @{{registration.category_colour}}, @{{registration.team_colour}});">@{{registration.day}} - @{{registration.month}} - @{{registration.year}}</th>
                                <td>@{{registration.hours}}</td>
                                <td class="truncate">@{{registration.category_name}}</td>
                                <td class="truncate">@{{registration.team_name}}</td>
                                <td class="truncate">@{{registration.description}}</td>
                                <td>@{{registration.state}}</td>
                                <td><a ng-click="deleteRegistration(registration.id)" class="uk-icon-button" uk-icon="icon:trash"></a><a href="#wijziguur-@{{registration.id}}" class="uk-icon-button navbarLink"uk-icon="icon:pencil"></a></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
