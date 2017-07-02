
/*
    Login controller
 */
var app = angular.module('loginForm', []);
if((window.location + "").endsWith('/inloggen')){
    if(typeof getCookie('token') != 'undefined'){
        window.location = '/app';
    }
}
app.controller('loginCtrl', function($scope, $http) {
    $scope.email = '';
    $scope.password = '';
    $scope.loginSubmit = function(event) {
        jQuery('.error_login .uk-alert').stop().hide();
        $http({
            method  :   "POST",
            url     :   API_HOST + "/token",
            data    :   {user: $scope.email, password: $scope.password}
        }).then(function(response) {
            //$scope.myData = response.data.records;
            var token = response.data.token;
            document.cookie = "token=" + token;
            window.location = "/app";
        }, function(response){
            jQuery('.error_login .' + response.status).stop().fadeIn(300);
        });
    }
});
