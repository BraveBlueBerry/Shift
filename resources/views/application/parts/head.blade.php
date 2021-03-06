<head>
  @if (isset($title))
    <title>{{$title}}</title>
  @else
    <title>Welkom bij Shift</title>
  @endif
  <!-- UIkit CSS -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/uikit/3.0.0-beta.24/css/uikit.min.css" />

  <!-- jQuery -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script>$.noConflict();</script>
  <!-- Angular -->
  <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.6.4/angular.min.js"></script>

  <!-- UIkit JS -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/uikit/3.0.0-beta.24/js/uikit.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/uikit/3.0.0-beta.24/js/uikit-icons.min.js"></script>

  <!-- My JS -->
  <script>
      var API_HOST = '{{env("API_HOST")}}';
      var USER_ID = {{$user->id}};
      var USER_FN = "{{$user->first_name}}";
      var USER_LN = "{{$user->last_name}}";
      var USER_EMAIL = "{{$user->email}}";
  </script>
  <script src="{{ URL::asset('js/common.js') }}"></script>
  <script src="{{ URL::asset('js/app.js') }}"></script>
  <script src="{{ URL::asset('js/toggle_menus.js') }}"></script>
  <script src="{{ URL::asset('js/toggle_application.js') }}"></script>

  <!-- Font Awesome -->
  <script src="https://use.fontawesome.com/4ec36e4a13.js"></script>

  <!-- CSS for table -->
  <link rel="stylesheet" href="{{ URL::asset('css/component.css') }}"/>

  <!-- My CSS -->
  <link rel="stylesheet" href="{{ URL::asset('css/stylesheet.css') }}"/>

</head>
