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
          @include('application.actualLanding')
          @include('application.overzicht')
          @include('application.teams')
      </div>
    </div>
  </body>
</html>
