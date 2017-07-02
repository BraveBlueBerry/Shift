<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;


class UserController extends APIController
{
    public function create(Request $request){
        $isset = ['first_name', 'last_name', 'email', 'pass1', 'pass2'];
        if(!$this->fieldsSet($isset, $request))
            return response()->json([], 400);
        $user = User::where('email','=',$request->user)->first();
        if(isset($user)){
            // 409, conflict
            return response()->json([], 409);
        }
        if($request->pass1 != $request->pass2){
            return response()->json([], 420);
        }
        $user = new User();
        $user->first_name = $request->first_name;
        $user->last_name = $request->last_name;
        $user->email = $request->email;
        $user->password = bcrypt($request->pass1);
        $user->save();
        return response()->json([], 200);
    }

    public function read(Request $request, $id){
        $response = $this->compareTokenWithUserId($request, $id);
        if($response !== true){
            return response()->json(error($response[0]), $response[1]);
        }
        $user = $this->getUserByToken($request->header('token'));
        $attributes = ['first_name', 'last_name', 'email', 'id', 'created_at', 'updated_at'];
        $return_user = $this->extractFromModel($user, $attributes);

        return response()->json($return_user, 200);
    }
    public function update(Request $request, $id){
        $response = $this->compareTokenWithUserId($request, $id);
        if($response !== true){
            return response()->json(error($response[0]), $response[1]);
        }
        $things_to_change = ['first_name', 'last_name', 'email'];
        $things_we_got = [];
        foreach($things_to_change as $user_attribute){
            if(isset($request->{$user_attribute})){
                array_push($things_we_got, $user_attribute);
            }
        }
        if(in_array('email', $things_we_got)){
            // Check if user with that email exists
            $user = User::where('email', '=', $request->email)->where('id', '<>', $id)->first();
            if($user){
                return response()->json(error('This email is in use.'), 409);
            }
        }
        $user = $this->getUserByToken($request->header('token'));
        foreach($things_we_got as $attribute){
            $user->{$attribute} = $request->{$attribute};
        }
        $user->save();
        return response()->json([], 200);
    }

    public function delete(Request $request, $id){
        $body = ['areyousure'];
        $header = ['token'];
        if(!$this->fieldsSet($body, $request))
            return response()->json([], 404);
        if(!$this->fieldsSet($header, $request, 'header'))
            return response()->json([], 404);

        if(strtolower($request->areyousure) != 'verwijder')
            return response()->json([], 406);

        $user = $this->getUserByToken($request->token);
        if(!$user)
            return response()->json([], 404);
        if($user->id != $id)
            return response()->json([], 403);

        // Ok, delete user - leave registrations
        $user->delete();
        return response()->json([], 200);
    }
}
