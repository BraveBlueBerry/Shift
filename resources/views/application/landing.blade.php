<html>
  @include('application.parts.head', ['title' => 'Shift | Welkom'])
  <body>
    <div id="pagebb">
      <div id="adg3navbb">
        @include('application.parts.navigation')
        @include('application.parts.navigationText')
        @include('application.parts.plusMenu')
        @include('application.parts.userMenu')
      </div>
      <div id="wrapperbb">
        <div id="contentbb">
          <div class="uk-text-lead headText app-headerbb">Welkom gebruiker</div>
          <div class="page-panelbb">
            <div class="page-panel-innerbb">
              <div class="page-panel-contentbb maskablebb" id="dashboard-containerbb">
                <div id="dashboard-overviewbb" class="dashboard-sectionbb">
                  <div class="dashboard-overviewbb">
                    <section class="dashboard-left-contentbb">
                      <i class="fa fa-check-square-o fa-5x" id="check" aria-hidden="true"></i> <br />
                      Op dit moment heb je geen uren die je nog moet opsturen.
                    </section>
                    <section class="dashboard-right-contentbb">
                      <img class="uk-align-center" width="180" height="165" src="{{url('storage/logozwartwit.png')}}" alt="">
                      Gelijk een registratie toevoegen?
                      <a href="#">Dat kan hier</a>
                    </section>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </body>
</html>
