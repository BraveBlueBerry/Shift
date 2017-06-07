<ul class="uk-navbar-nav">
    <li class="{{(Route::currentRouteName() == 'home') ? 'uk-active' : 'uk-parent'}}"><a href="{{route('home')}}">Home</a></li>
    <li class="{{(Route::currentRouteName() == 'aanmelden') ? 'uk-active' : 'uk-parent'}}"><a href="{{route('aanmelden')}}">Aanmelden</a></li>
    <li class="{{(Route::currentRouteName() == 'inloggen') ? 'uk-active' : 'uk-parent'}}"><a href="{{route('inloggen')}}">Inloggen</a></li>
    <li class="{{(Route::currentRouteName() == 'contact') ? 'uk-active' : 'uk-parent'}}"><a href="{{route('contact')}}">Contact</a></li>
</ul>
