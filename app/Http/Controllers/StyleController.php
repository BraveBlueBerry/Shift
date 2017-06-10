<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class StyleController extends Controller
{
    //
    function index() {
      return view('styletest');
    }

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

    function landing() {
      return view('application.landing');
    }

    function overzicht() {
      return view('application.overzicht');
    }
}

?>
