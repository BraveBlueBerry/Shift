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

    <!--  Import the css file of the app-->
    <style type="text/css" media="screen,projection">
    @import url("css/app.css");
    </style>

</head>
<body>
  <nav class="uk-navbar-container" uk-navbar>
    <div class=".uk-navbar-left">
      <p style="margin-left: 1em; font-size: 30pt;">Shift</p>
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
<div class="uk-grid">
    <div class="uk-width-1-3"></div>
    <div class="uk-width-1-3" style="margin-top: 100px;">
      <center><h2>Contact opnemen</h2></center>
      <center><h4>Indien u de behoefte heeft om contact met ons op te nemen kan dit via onderstaand contact formulier.</h4></center>
      <form class="uk-panel uk-panel-box uk-form" style="background: #F0F0F0; border-radius: 10px;">

          <div class="uk-form-row">
            <p style="margin: 10px 0px 0px 30px;">Naam:</p><br/>
              <input class="uk-width-1-1 uk-form-default"style="
                width: 90%;
                padding: 12px 20px;
                margin: 0px 0px 0px 20px;
                display: inline-block;
                border: 1px solid #ccc;
                border-radius: 4px;
                box-sizing: border-box;"
              type="text">
          </div>
          <div class="uk-form-row">
            <p style="margin: 10px 0px 0px 30px;">E-mail:</p><br/>
              <input class="uk-width-1-1 uk-form-default" style="
                width: 90%;
                padding: 12px 20px;
                margin: 0px 0px 0px 20px;
                display: inline-block;
                border: 1px solid #ccc;
                border-radius: 4px;
                box-sizing: border-box;" type="text">
          </div>

          <div class="uk-form-row">
            <p style="margin: 10px 0px 0px 30px;">Bericht:</p><br/>
              <input class="uk-width-1-1 uk-form-default" style="
                width: 90%;
                padding: 72px 20px;
                margin: 0px 0px 0px 20px;
                display: inline-block;
                border: 1px solid #ccc;
                border-radius: 4px;
                box-sizing: border-box;" type="text">
          </div>
          <div class="uk-form-row">
              <a class="uk-width-1-1 uk-button uk-button-primary uk-button-small" href="#" style="
                width: 90%;
                height: 50px;
                padding: 12px 20px;
                margin: 10px 0px 0px 20px;
                display: inline-block;
                border: 1px solid #ccc;
                border-radius: 4px;
                box-sizing: border-box;
                border-radius: 5px;">Verstuur</a>
          </div>
          <div class="uk-form-row uk-text-small">
          </div>
      </form>
    </div>
    <div class="uk-width-1-3"></div>
</div>
</body>
</html>
