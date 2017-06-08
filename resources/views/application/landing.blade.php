<html>
  @include('application.parts.head', ['title' => 'Shift | Welkom'])
  <body>
    @include('application.parts.navigation')
    @include('application.parts.navigationText')

    <div class="right">

      <div class="uk-text-lead" id="welkomText">Welkom gebruiker</div>
      <div class="uk-grid" style="margin-top:50px;">
        <div class="uk-width-1-2 uk-text-center" style=" padding-right:80px; flex:0 0 350px;">
          <i class="fa fa-check-square-o fa-5x" id="check" aria-hidden="true"></i> <br />
          Op dit moment heb je geen uren die je nog moet opsturen.
        </div>
        <div class="uk-width-1-2" style="padding-left:100px; border-left: 1px solid #ccc;">
          <img class="uk-align-center" width="180" height="165" src="{{url('storage/logozwartwit.png')}}" alt="">
          Gelijk een registratie toevoegen?
          <a href="#">Dat kan hier</a>
        </div>
      </div>

    </div>
  </body>
</html>
