<html>
  @include('application.parts.head', ['title' => 'Shift | Welkom'])
  <body>
    <div id="pagebb">
      <div id="adg3navbb">
        @include('application.parts.navigation')
        @include('application.parts.navigationText')
      </div>
      <div id="wrapperbb">
          @include('application.actualLanding')
          @include('application.overzicht')
          @include('application.teams')
      </div>
    </div>
  </body>
</html>
