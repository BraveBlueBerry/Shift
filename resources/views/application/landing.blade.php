<html>
  @include('application.parts.head', ['title' => 'Shift | Welkom'])
  <body>
    <div id="pagebb">
      <div id="adg3navbb">
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
      </div>
    </div>
  </body>
</html>
