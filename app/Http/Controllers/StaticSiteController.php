<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


class StaticSiteController extends Controller
{
    function aanmelden() {
      return view('static.aanmelden');
    }

    function contact() {
      return view('static.contact');
    }

    function home() {
      return view('static.home');
    }

    function inloggen() {
      return view('static.inloggen');
    }
}

?>
