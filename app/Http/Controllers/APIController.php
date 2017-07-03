<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Token;
use App\Models\User;
use App\Models\Team;

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
            return ['Token not set in header.', 400];
        }
        $user = $this->getUserByToken($request->header('token'));
        if(!$user)
            return ["Token invalid.", 401];
        if($user->id != $id){
            $all_is_fine = false;
            $team_ids = $user->invitations()->pluck('team')->toArray();
            foreach($team_ids as $team_id){
                $team = Team::where('id','=',$team_id)->first();
                $owner = $team->owner;
                if($id == $owner){
                    $all_is_fine = true;
                }
            }
            if(!$all_is_fine)
                return ["Can only change the token's user.", 403];
        }
        return true;
    }

    public static function createObjectFromArray($array){
        $return = new \StdClass;
        foreach($array as $k => $v){
            $return->{$k} = $v;
        }
        return $return;
    }

    protected function updateModelFromRequest($things_to_change, $model, $request){
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

function error($errormessage){
    return APIController::createObjectFromArray(["error"=>$errormessage]);
}


?>
