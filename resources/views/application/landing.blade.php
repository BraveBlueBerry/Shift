<html>
  @include('application.parts.head', ['title' => 'Shift | Welkom'])
  <body ng-app="Shift">
    <div id="pagebb">
      <div id="adg3navbb" ng-controller="menuController" >
        @include('application.parts.navigation')
        @include('application.parts.navigationText')
        @include('application.parts.plus_menu')
        @include('application.parts.user_menu')
      </div>
      <div id="wrapperbb">
          @include('application.actualLanding')
          @include('application.overzicht')
          @include('application.teams')
          @include('application.maak_uur')
          @include('application.maak_cat')
          @include('application.maak_team')
          @include('application.account')
          @include('application.instellingen')
          @include('application.wijzig_ww')
          @include('application.wijzig_uur')
          @include('application.wijzig_team')
          @include('application.add_member')
      </div>
    </div>
  </body>
</html>
