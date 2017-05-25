<html>
<head>
    <title>Contact</title>
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
            <li class="uk-parent"><a href="">Home</a></li>
            <li class="uk-parent"><a href="">Aanmelden</a></li>
            <li class="uk-parent"><a href="">Inloggen</a></li>
            <li class="uk-active"><a href="">Contact</a></li>
        </ul>
    </div>
  </nav>

<!-- Container voor contact formulier -->
<div class="uk-grid">
    <div class="uk-width-1-3"></div>
    <div class="uk-width-1-3 container contact">
      <center><h2>Contact opnemen</h2></center>
      <center><h4>Indien u de behoefte heeft om contact met ons op te nemen kan dit via onderstaand contact formulier.</h4></center>
      <form class="uk-panel uk-panel-box uk-form form">
          <div class="uk-form-row">
              <input class="uk-width-1-1 uk-form-default" type="text" placeholder="Naam">
          </div>
          <div class="uk-form-row">
              <input class="uk-width-1-1 uk-form-default" type="text" placeholder="Email-adres">
          </div>
          <div class="uk-form-row">
            	<p id="textBericht">
                Bericht:
              </p>
              <textarea class="uk-width-1-1 uk-form-default" rows="5" >
              </textarea>
          </div>
          <div class="uk-form-row">
              <a class="uk-width-1-1 uk-button uk-button-primary uk-button-small button tertiary" href="#" >Verstuur</a>
          </div>
          <div class="uk-form-row uk-text-small">
          </div>
      </form>
    </div>
    <div class="uk-width-1-3"></div>
</div>
</body>
</html>
