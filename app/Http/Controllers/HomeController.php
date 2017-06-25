<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Test.php

class HomeController extends Controller
{
    //
    function index() {
      $name = "Talitha";
      return view('home', compact('name'));
    }

    function test() {
      return view("api_test");
    }
}

?>
