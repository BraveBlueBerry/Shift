<html>
<head>
    <title>Welkom op Shift.nl!</title>
    <!-- UIkit CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/uikit/3.0.0-beta.24/css/uikit.min.css" />

    <!-- jQuery -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

    <!-- UIkit JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/uikit/3.0.0-beta.24/js/uikit.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/uikit/3.0.0-beta.24/js/uikit-icons.min.js"></script>

    <!-- My CSS -->
    <link rel="stylesheet" href="{{ URL::asset('css/stylesheet.css') }}"/>

</head>
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
        <ul class="uk-navbar-nav">
          <li class="uk-current"><a href="">Home</a></li>
          <li class="uk-parent"><a href="">Aanmelden</a></li>
          <li class="uk-parent"><a href="">Inloggen</a></li>
          <li class="uk-parent"><a href="">Contact</a></li>
        </ul>
      </div>
    </nav>
    <!-- Content page -->
    <div class="uk-grid">
      <div class="uk-width-1-3">

      </div>
      <div class="uk-width-1-3" id="containerStart">
        <center><h1>Shift</h1></center>
        <center><h2>Krachtige alles-in-1 uren registratie applicatie</h2></center>
        <center><h4>Vind u het bijhouden van uw uren ook zo ingewikkeld en tijdrovend? Met deze applicatie wordt dit makkelijker dan ooit. U kunt met één klik teams samenstellen en uren registreren. Maak direct een gratis account aan! </h4></center>
        <center><button class="button tertiary" id="buttonAanmeldenStart">Aanmelden</button></center>
      </div>
      <div class="uk-width-1-3"></div>
    </div>
  </body>
</html>
