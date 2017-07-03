<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Registration;
use App\Models\Team;
use App\Models\Category;
use App\Models\Status;

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
        if($this->fieldsSet(['team'], $request)){
            $team = Team::where("id","=",$request->team)->first();
            if(!$team)
                return response()->json(error("Team doesn't exist"), 404);
            $members = $team->members()->pluck('id')->toArray();
            $members[] = $team->owner;
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
        $registration->status = 1;
        if(isset($request->status)){
            $status = Status::where('id','=',$request->status)->first();
            if(!$status)
                return response()->json(error("Status does not exist"), 404);
            $registration->status = $request->status;
        }

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
        $user = $this->getUserByToken($request->header('token'));
        if(!$user)
            return response()->json(error("No user for this token"), 401);
        return response()->json($user->registrations, 200);
    }
    public function readAllTeam(Request $request, $team_id){
        $user = $this->getUserByToken($request->header('token'));
        if(!$user)
            return response()->json(error("No user for this token"), 401);
        $team = Team::where("id","=",$request->team)->first();
        if(!$team)
            return response()->json(error("Team doesn't exist"), 404);

        $members = $team->members()->pluck('id')->toArray();
        if(in_array($user->id, $members)){
            $registrations = Registration::where('team','=',$team_id)->where('user','=',$user->id)->get();
            return response()->json($registrations, 200);
        }
        if($team->owner == $user->id){
            $registrations = Registration::where('team','=',$team_id)->where('status','<>',1)->get();
            return response()->json($registrations, 200);
        }

        return response()->json(error("User not part of team"), 403);

    }
    public function update(Request $request, $id){
        $user = $this->getUserByToken($request->header('token'));
        $request = $this->createObjectFromArray($request->all());
        if(!$user)
            return response()->json(error("No user for this token"), 401);
        $registration = Registration::where('team','=',$id)->first();
        if(!$registration)
            return response()->json(error("Registration doesn't exist"), 404);
        $team = Team::where('id', '=', $registration->team)->first();
        $can_edit = [];
        if($team){
            if($team->owner != $user->id){
                if($user->id == $registration->user){
                    if($registration->status == 1){ // Concept
                        $can_edit += ['team','category','description','uren','datetime','status'];
                    }
                }
                return response()->json(error("User associated with token can't access resource"), 403);
            }
            elseif($registration->status != 1){
                $can_edit += ['status'];
            }
            else{
                return response()->json(error("Registration is a concept, can't be edited by team owner"), 403);
            }
        }
        else{
            if($user->id == $registration->user){
                $can_edit += ['team','category','description','uren','datetime','status'];
            }
            else{
                return response()->json(error("User associated with token can't access resource"), 403);
            }
        }
        // at this point we have a list, $can_edit with all the fields we're accepting
        if(isset($request->team) && in_array('team',$can_edit)){
            $team = Team::where('id','=',$request->team)->first();
            $members = $team->members()->toArray() + [$team->owner];
            if(!in_array($user->id, $members){
                // Part of team
                $registration->team = $team->id;
            }
            else{
                return response()->json(error("User is not part of that team"), 403);
            }
        }
        if(isset($request->category && in_array('category',$can_edit))){
            if(isset($registration->team))
                $category = Category::where('id','=',$request->category)->where('team','=',$registration->team)->first();
            else
                $category = Category::where('id','=',$request->category)->where('user','=',$user->id)->first();
            if(!$category){
                return response()->json(error("Category doesn't exist, or is not part of the team"), 404);
            }
        }
        if(in_array('status', $can_edit) && isset($request->status)){
            $statuses = Status::get()->toArray();
            if(!in_array($request->status, $statuses))
                return response()->json(error("Status doesn't exist"), 404);
            $registration->status = $request->status;
        }
        if(in_array('description', $can_edit) && isset($request->omschrijving)){
            $registration->description = $request->omschrijving;
        }
        if(in_array('uren', $can_edit) && isset($request->uren)){
            $registration->uren = $request->uren;
        }
        if(in_array('datetime', $can_edit) && isset($request->datetime)){
            if(!$this->checkTimeString($request->datetime))
                return response()->json(error("Datetime must of format yyyy-mm-dd"), 400);
            $split = explode('-', $request->datetime);
            $registration->year = $split[0];
            $registration->month = $split[1];
            $registration->day = $split[2];
        }
        $registration->save();
        return response()->json([], 200);
    }
    public function delete(Request $request, $id){
        $user = $this->getUserByToken($request->header('token'));
        $request = $this->createObjectFromArray($request->all());
        if(!$user)
            return response()->json(error("No user for this token"), 401);
        $registration = Registration::where('id','=',$id)->first();
        if(!$registration)
            return response()->json(error("No registration"), 404);
        if($registration->user != $user->id)
            return response()->json(error("User can't access resource"), 403);
        $registration->delete();
        return response()->json([],200);
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
