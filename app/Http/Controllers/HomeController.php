<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Test;

class HomeController extends Controller
{
    function index(){
        $welkom = "Player One";

        return view('home', compact('welkom'));
    }
    function example(){
        return view('example');
    }
}
