<html>
  @include('head')
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
