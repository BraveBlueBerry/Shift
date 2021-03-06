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
    <!-- My CSS -->
    <link rel="stylesheet" href="{{ URL::asset('css/stylesheet.css') }}"/>
    <!-- My Javascript -->
    <script>
        var API_HOST = '{{env("API_HOST")}}';
    </script>
    <script src="{{ URL::asset('js/common.js') }}"></script>
    <script src="{{ URL::asset('js/static.js') }}"></script>
</head>
