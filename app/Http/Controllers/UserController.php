<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    public function create(Request $request){
        $isset = ['fn', 'ln', 'email', 'pass1', 'pass2'];
        foreach($isset as $check){
            if(!isset($request->{$check})){
                return response()->json([], 404);
            }
        }
        $user = User::where('email','=',$request->user)->first();
        if(isset($user)){
            // 409, conflict
            return response()->json([], 409);
        }
        if($request->pass1 != $request->pass2){
            return response()->json([], 420);
        }

        $user = new User();
        $user->first_name = $request->fn;
        $user->last_name = $request->ln;
        $user->email = $request->email;
        $user->password = bcrypt($request->pass1);
        $user->save();
        return response()->json([], 200);
    }
    public function read($id){

    }
    public function update(Request $request, $id){

    }
    public function delete($id){

    }
}
