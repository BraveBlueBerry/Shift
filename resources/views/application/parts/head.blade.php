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

  <!-- UIkit JS -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/uikit/3.0.0-beta.24/js/uikit.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/uikit/3.0.0-beta.24/js/uikit-icons.min.js"></script>

  <!-- Font Awesome -->
  <script src="https://use.fontawesome.com/4ec36e4a13.js"></script>

  <!-- My CSS -->
  <link rel="stylesheet" href="{{ URL::asset('css/stylesheet.css') }}"/>
</head>
