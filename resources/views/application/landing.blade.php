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
  <script>
      $(function() {
          $("#contentbb_overzicht").hide();
          $("#contentbb_teams").hide();
      });

      $(function(){
          $('.knop1').click(function() {
              $("#contentbb_landing").hide();
              $("#contentbb_teams").hide();
              $("#contentbb_overzicht").show();
          });
      });

    $(function(){
        $('.knop2').click(function() {
            $("#contentbb_overzicht").hide();
            $("#contentbb_landing").hide();
            $("#contentbb_teams").show();
        });
    });

      $(function(){
          $('.landingknop').click(function() {
              $("#contentbb_overzicht").hide();
              $("#contentbb_teams").hide();
              $("#contentbb_landing").show();
          });
      });
  </script>
</html>
