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
      return view('aanmelden');
    }

    function contact() {
      return view('contact');
    }

    function home() {
      return view('home');
    }

    function inloggen() {
      return view('inloggen');
    }
}

?>
