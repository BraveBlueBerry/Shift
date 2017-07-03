<script>
    function onLoad_landing(){
        angular.element(jQuery('#content_landing')[0]).scope().getInvite();
    }
    setInterval(function(){
        onLoad_landing();
    }, 5000);
</script>
<div id="content_landing" ng-controller="invitationController" class="content_right">
    <div class="uk-text-lead headText app-headerbb">Welkom {{$user->first_name}}</div>
    <div class="page-panelbb">
        <div class="page-panel-innerbb">
            <div class="page-panel-content maskablebb" id="dashboard-containerbb">
                <div id="dashboard-overviewbb" class="dashboard-sectionbb">
                    <div class="dashboard-overviewbb">
                        <section class="dashboard-left-content">
                            <i class="fa fa-check-square-o fa-5x" id="check" aria-hidden="true"></i> <br/>
                            Op dit moment heb je geen uren die je nog moet opsturen.
                            <div ng-show="invitations.length > 0">
                                Je hebt een uitnodiging gekregen voor een team!
                            </div>
                        </section>
                        <section class="dashboard-right-content">
                            <img class="uk-align-center" width="180" height="165" src="{{url('storage/logozwartwit.png')}}" alt="">
                            Gelijk een registratie toevoegen?
                            <a class="navbarLink" href="#maakuur">Dat kan hier</a>
                        </section>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
