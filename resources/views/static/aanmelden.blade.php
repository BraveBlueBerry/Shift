<html>
@include('static.parts.head', ['title' => 'Shift | Aanmelden'])
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
  <script>
  var app = angular.module('newAccountForm', []);
  app.controller('accountCtrl', function($scope, $http) {
      $scope.first_name = '';
      $scope.pass1 = '';
      $scope.last_name = '';
      $scope.email = '';
      $scope.pass2 = '';
      $scope.createSubmit = function(event) {

          $http({
              method  :   "POST",
              url     :   "{{env('API_HOST')}}/user",
              data    :   { first_name: $scope.first_name,
                            last_name: $scope.last_name,
                            email: $scope.email,
                            pass1: $scope.pass1,
                            pass2: $scope.pass2}
          }).then(function(response) {
              //$scope.myData = response.data.records;
              window.location = "/inloggen";
          });
      }
  });
  </script>
  <!-- Aanmelden container inclusief logo -->
  <div class="uk-vertical-align uk-text-center uk-height-1-1">
      <div class="uk-vertical-align-middle container" ng-app="newAccountForm" ng-controller="accountCtrl">
          <img class="uk-margin-bottom" width="140" height="120" src="{{url('storage/logo.png')}}" alt="">
          <center>
            <h4>Maak een account aan voor Shift</h4>
          </center>
          <form ng-submit='createSubmit()' class="uk-panel uk-panel-box uk-form aanmelden">
              <div class="uk-form-row">
                  <input  id="input_static" class="uk-width-1-1 uk-form-default" type="text" ng-model='first_name' placeholder="Voornaam">
              </div>
              <div class="uk-form-row">
                  <input  id="input_static" class="uk-width-1-1 uk-form-default" type="text" ng-model='last_name' placeholder="Achternaam">
              </div>
              <div class="uk-form-row">
                  <input  id="input_static" class="uk-width-1-1 uk-form-default" type="text" ng-model='email' placeholder="E-mail">
              </div>
              <div class="uk-form-row">
                  <input  id="input_static" class="uk-width-1-1 uk-form-default" type="password" ng-model='pass1' placeholder="Wachtwoord">
              </div>
              <div class="uk-form-row">
                  <input  id="input_static" class="uk-width-1-1 uk-form-default" type="password" ng-model='pass2' placeholder="Wachtwoord opnieuw">
              </div>
              <div class="uk-form-row">
                  <input  id="input_static" type='submit' class="uk-width-1-1 button tertiary" value='Registreer' />
              </div>
          </form>
      </div>
  </div>
</body>
</html>
