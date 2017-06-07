<html>
  @include('static.parts.head')
  <body>

    <!-- Header static pages -->
    <nav class="uk-navbar-container" uk-navbar>
      <div class="uk-navbar-left">
        <ul class="uk-navbar-nav">
          <li class="uk-parent"><img id="logoImageHome" width="60" height="55" src="{{url('storage/logo.png')}}" alt="">          </li>
          <li class="uk-parent"><p class="logoText">Shift</p></li>
        </ul>
      </div>
      <div class="uk-navbar-right">
        @include('static.parts.navigation')
      </div>
    </nav>
    <!-- Content page -->
    <div class="containerHome1 uk-grid">
        <div class="uk-width-1-3@m uk-width-1-1@s">
        </div>
        <div class="uk-width-1-3@m uk-width-1-1@s">
          <center><h1>Shift</h1></center>
          <center><h2>Krachtige alles-in-1 uren registratie applicatie</h2></center>
          <center><h4>Vind u het bijhouden van uw uren ook zo ingewikkeld en tijdrovend? Met deze applicatie wordt dit makkelijker dan ooit. U kunt met één klik teams samenstellen en uren registreren. Maak direct een gratis account aan! </h4></center>
          <center><button class="button tertiary" id="buttonAanmeldenStart">Aanmelden</button></center>
        </div>
        <div class="uk-width-1-3@m uk-width-1@s"></div>
    </div>
    <!-- features -->
    <div class="containerHome2 uk-grid">
      <div class="uk-width-1-2@s">
        <table id="featuresTable">
          <tr>
            <th class="titlePrimary" id="featuresColumn">
              Shift helpt iedereen!
            </th>
          </tr>
          <tr>
            <th class="textPrimary">
              Een systeem waardoor iedereen weer zijn uren met plezier kan invullen. Shift maakt uren bijhouden makkelijk!
            </th>
          </tr>
          <tr>
            <th class="titleSecondary">
              Snel uren invullen
            </th>
          </tr>
          <tr>
            <th class="textSecondary">
              Stukje tekst dat uitlegt waarom je met Shift super snel je uren zou kunnen invullen. Want Shift heeft zo'n makkelijke interface ofso.
            </th>
          </tr>
          <tr>
            <th class="titleSecondary">
              Een duidelijk overzicht van al jouw werk
            </th>
          </tr>
          <tr>
            <th class="textSecondary">
              Met Shift kun je zien waar al jouw harde werken op neer komt. Al jouw gemaakte uren in één duidelijk overzicht.
            </th>

          </tr>
        </table>
      </div>
      <div class="uk-width-1-2@s ">
        <img id="overzichtImage" src="{{url('storage/overzicht.jpg')}}" alt="">
      </div>
    </div>
    <!-- Other cool things -->
    <div class="containerHome3">

    </div>
  </body>
</html>
