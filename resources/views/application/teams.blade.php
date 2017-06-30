<div id="content_teams" class="content_right">
    <div class="uk-text-lead headText app-headerbb">Overzicht teams</div>
    <div class="page-panelbb">
        <div class="page-panel-innerbb">
            <div class="page-panel-content maskablebb" id="dashboard-containerbb">
                <div id="dashboard-overviewbb" class="dashboard-sectionbb">
                    <div class="dashboard-overviewbb">
                        <section class="dashboard-left-content">
                            <i class="fa fa-users fa-5x" style="margin-top:100px;"></i> <br/> <br/>
                            Welkom op de team pagina!
                        </section>
                        <section class="dashboard-right-content">
                            <!--
                            <img class="uk-align-center" width="180" height="165" src="{{url('storage/logozwartwit.png')}}" alt="">
                            Op het moment zijn er nog geen teams waarin je zit. <br /> Wil je een team toevoegen?
                            <a class="navbarLink" href="#maakteam">Dat kan hier</a>
                            -->
                            @include('application.table.table_teams')
                        </section>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
