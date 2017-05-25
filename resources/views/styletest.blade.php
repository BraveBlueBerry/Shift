<html>
  <head>
    <!-- UIkit CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/uikit/3.0.0-beta.24/css/uikit.min.css" />

    <!-- jQuery is required -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

    <!-- UIkit JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/uikit/3.0.0-beta.24/js/uikit.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/uikit/3.0.0-beta.24/js/uikit-icons.min.js"></script>

    <!-- My CSS -->
    <link rel="stylesheet" href="{{ URL::asset('css/stylesheet.css') }}"/>

    <title>
      Testen van de style
    </title>
  </head>
  <body>
    <div class="header">
      <div class="button secondary">
        Button
      </div>
      <div class="button">
        Button
      </div>
    </div>
    <div class="uk-divider-icon"> </div>
    <div class="container">

    <form>
      <input type="text" placeholder="Emailadres"/> <br />
      <input type="password" placeholder="Wachtwoord" /> <br />
      <input type="submit" class="button tertiary" value="Inloggen"/> <br />
    </form>
    <div class="uk-alert-danger" uk-alert>
      <a class="uk-alert-close" uk-close></a>
      <p>
        Wachtwoord niet juist!
      </p>
    </div>
  </div>
  </body>
</html>
