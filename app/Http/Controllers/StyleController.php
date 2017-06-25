<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use App\Models\Token;
use App\Models\User;

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
      if(isset($_COOKIE['token'])){
          $token = Token::where('token', '=', $_COOKIE['token'])->first();
          if(!isset($token)){
              // redirect naar inloggen
              return redirect('inloggen');
          }
          $user = User::where('id','=',$token->user)->first();
      }
      else{
          return redirect('inloggen');
      }
      return view('application.landing', compact('user'));
    }

    function overzicht() {
      return view('application.overzicht');
    }
}

?>
