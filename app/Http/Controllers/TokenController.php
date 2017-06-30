<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Token;
use Hash;

class TokenController extends APIController
{
    public function create(Request $request){
        $isset = ['user', 'password'];
        if(!$this->fieldsSet($isset, $request))
            return response()->json([], 404);

        $user = User::where('email','=',$request->user)->first();
        if(!isset($user)){
            // User doesn't even exist, actual 404
            return response()->json([], 404);
        }
        $password = Hash::check($request->password, $user->password);
        if($password){
            // This is the guy
            $token = new Token();
            $token->user = $user->id;
            $token->token = md5($user->id . time());
            $token->save();
            return response()->json(['token'=>$token->token], 200);
        }
        else{
            // Invalid password
            return response()->json([], 404);
        }
    }
    public function read($id){
        $token = Token::where('token', '=', $id)->first();
        if(isset($token))
            return response()->json([$token], 200);
        return response()->json([], 404);
    }
    public function delete(Request $request){
        $header = ['token'];
        if(!$this->fieldsSet($isset, $request, 'header'))
            return response()->json([], 404);
        $token = Token::where('token','=',$request->header('token'))->first();
        $token->delete();
        return response()->json([], 200);
    }
}
