<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Token;
use App\Models\User;

class APIController extends Controller
{
    protected function fieldsSet($fields, Request $request, $location='body'){
        foreach($fields as $check){
            if($location == 'body'){
                if(!isset($request->{$check})){
                    return false;
                }
            }
            if($location == 'header'){
                $head = $request->header($check);
                if(!isset($head))
                    return false;
            }
        }
        return true;
    }
    protected function getUserByToken($token){
        $tokenObject = Token::where('token', '=', $token)->first();
        if(!isset($tokenObject))
            return false;
        return User::where('id', '=', $tokenObject->user)->first();
    }

    protected function extractFromModel($model, $attributes){
        $return = new \StdClass;
        foreach($attributes as $attribute){
            if(isset($model->{$attribute})){
                $return->{$attribute} = $model->{$attribute};
            }
        }
        return $return;
    }

    protected function compareTokenWithUserId(Request $request, $id){
        $header = ['token'];

        if(!$this->fieldsSet($header, $request, 'header')){
            return 404;
        }
        $user = $this->getUserByToken($request->header('token'));
        if(!$user)
            return 403;
        if($user->id != $id)
            return 403;
        return true;
    }

    protected function createObjectFromArray($array){
        $return = new \StdClass;
        foreach($array as $k => $v){
            $return->{$k} = $v;
        }
        return $return;
    }

    protected function updateModelFromRequest($things_to_change, $model, Request $request){
        $things_we_got = [];
        foreach($things_to_change as $attribute){
            if(isset($request->{$attribute})){
                array_push($things_we_got, $attribute);
            }
        }
        foreach($things_we_got as $attribute){
            $model->{$attribute} = $request->{$attribute};
        }
        $model->save();
    }
}


?>
