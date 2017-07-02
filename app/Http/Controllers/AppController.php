<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;

class AppController extends Controller
{
    function landing() {
        if(isset($_COOKIE['token'])){
            $url = env('API_HOST') . '/token/' . $_COOKIE['token'];

            $ch = curl_init($url);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "GET");
            $res = curl_exec($ch);
            $token = json_decode($res);
            if(!isset($token->token)){
                // redirect naar inloggen
                return redirect('inloggen');
            }
            $url = env('API_HOST') . '/user/' . $token->user;
            $ch = curl_init($url);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "GET");
            curl_setopt($ch, CURLOPT_HTTPHEADER, ['token: ' . $token->token]);
            $res = curl_exec($ch);
            $user = json_decode($res);
        }
        else{
            return redirect('inloggen');
        }
        return view('application.landing', compact('user'));
    }
}

?>
