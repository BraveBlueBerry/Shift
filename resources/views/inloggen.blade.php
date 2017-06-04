<html>
@include('head', ['title' => 'Shift | Inloggen'])
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
        @include('navigation')
      </div>
    </nav>
    <!-- Inloggen container inclusief logo -->
    <div class="uk-vertical-align uk-text-center uk-height-1-1">
        <div class="uk-vertical-align-middle container">
            <img class="uk-margin-bottom" width="140" height="120" src="{{url('storage/logo.png')}}" alt="">
            <center>
              <h4>Log in bij Shift</h4>
            </center>
            <form class="uk-panel uk-panel-box uk-form" style="background: #F0F0F0; border-radius: 10px;">
              <div class="uk-form-row">
                  <input class="uk-width-1-1 uk-form-default" type="text" placeholder="E-mail">
              </div>
              <div class="uk-form-row">
                  <input class="uk-width-1-1 uk-form-default" type="password" placeholder="Wachtwoord">
              </div>
              <div class="uk-form-row">
                  <a class="uk-width-1-1 button tertiary" href="#">Log in</a>
              </div>
                <div class="uk-form-row uk-text-small">
                    <label class="uk-float-left" id="rememberMe"><input id="checkbox" type="checkbox">Remember me</label>
                    <a id="forgotPassword" class="uk-float-right uk-link uk-link-muted" href="#">Forgot Password?</a>
                </div>
            </form>

        </div>
    </div>
</body>
</html>
