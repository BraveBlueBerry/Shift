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
                            </tr>
                        </thead>
                        <tbody>
                            <!-- empty row -->
                            <tr ng-repeat="registration in registrations">
                                <th style="background-color:@{{registration.category_colour}};">@{{registration.day}} - @{{registration.month}} - @{{registration.year}}</th>
                                <td>@{{registration.hours}}</td>
                                <td>@{{registration.user_name}}</td>
                                <td class="truncate">@{{registration.category_name}}</td>
                                <td class="truncate">@{{registration.description}}</td>
                                <td>@{{registration.status_name}}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
