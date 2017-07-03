<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Registration;
use App\Models\Team;
use App\Models\Category;

class RegistrationController extends APIController
{
    public function create(Request $request){
        $isset = ['uren','omschrijving','category','datetime'];
        $user = $this->getUserByToken($request->header('token'));
        if(!$user)
            return response()->json(error("No user for this token"), 401);
        if(!$this->fieldsSet($isset, $request))
            return response()->json(error("Fields missing: 'uren','omschrijving', 'datetime' and 'category' must be set."), 400);
        $registration = new Registration();
        if($this->fieldsSet(['team'])){
            $team = Team::where("id","=",$request->team)->first();
            if(!$team)
                return response()->json(error("Team doesn't exist"), 404);
            $members = $team->members()->pluck('id')->toArray();
            $memebrs[] = $team->owner;
            if(!in_array($user->id, $members))
                return response()->json(error("User not part of team"), 403);
            $category = Category::where("id","=",$request->category)->where("team","=",$request->team)->first();
            if(!$category)
                return response()->json(error("Category doesn't exist for this team."), 404);
            $registration->team = $request->team;
            $registration->category = $request->category;
        }
        else{
            $category = Category::where("id","=",$request->category)->where("user","=",$user->id)->first();
            if(!$category)
                return response()->json(error("Category doesn't exist."), 404);
            $registration->category = $request->category;
        }
        if(!$this->checkTimeString($request->datetime))
            return response()->json(error("Datetime must of format yyyy-mm-dd"), 400);
        $registration->user = $user->id;
        $registration->description = $request->omschrijving;
        if(isset($request->document))
            $registration->document = $request->document;
        $registration->hours = $request->uren;

        $split = explode('-', $request->datetime);
        $registration->year = $split[0];
        $registration->month = $split[1];
        $registration->day = $split[2];
        $registration->save();
        return response()->json([],200);
    }
    public function read(Request $request, $id){
        $user = $this->getUserByToken($request->header('token'));
        if(!$user)
            return response()->json(error("No user for this token"), 401);
        $registration = Registration::where('id','=',$id)->first();
        if(!$registration)
            return response()->json(error("No user for this token"), 404);
        if($user->id != $registration->user){
            $team = Team::where('id', '=', $registration->team)->first();
            if($user->id != $team->owner)
                return response()->json(error("Not the owner of the team or owner of the resource"), 403);
        }
        $attributes = ['year','day','month','id','hours','category','description','status','team','user'];
        $obj = $this->extractFromModel($registration, $attributes);
        return response()->json($obj, 200);

    }
    public function readAll(Request $request){
        return response()->json(error("Not implemented"), 500);
    }
    public function readAllTeam(Request $request){

    }
    public function update(Request $request, $id){
        return response()->json(error("Not implemented"), 500);
    }
    public function delete($id){
        return response()->json(error("Not implemented"), 500);
    }
    private function checkTimeString($input){
        $time = explode('-',$input);
        if(count($time) != 3)
            return false;
        $length = [4,2,2];

        foreach($time as $key => $number){
            if(!is_numeric($number))
                return false;
            if(strlen($number) != $length[$key])
                return false;
        }
        if($time[0] < 1970)
            return false;
        if($time[1] < 1 || $time[1] > 12)
            return false;
        if($time[2] < 1 || $time[2] > 31)
            return false;

        return true;
    }
}
