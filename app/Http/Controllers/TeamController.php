<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Team;
use App\Models\Category;
use App\Models\Invitation;
use App\Models\Registration;

class TeamController extends APIController
{
    public function create(Request $request){
        $isset = ['team_name', 'colour'];
        $user = $this->getUserByToken($request->header('token'));
        if(!$user)
            return response()->json(error("No user for this token"), 401);
        if(!$this->fieldsSet($isset, $request))
            return response()->json(error("Fields missing: team_name and colour must be set."), 400);
        $team = new Team();
        $team->name = $request->team_name;
        $team->colour = $request->colour;
        $team->owner = $user->id;
        $team->save();
        return response()->json([], 200);
    }

    public function read($id){
        $team = Team::where('id', '=', $id)->first();
        if(!$team)
            return response()->json(error("Team not found"), 404);
        $attributes = ['id','name','owner','colour'];
        $object = $this->extractFromModel($team, $attributes);
        return response()->json($object, 200);
    }
    public function readAll(Request $request){
        $user = $this->getUserByToken($request->header('token'));
        if(!$user)
            return response()->json(error("No user for this token"), 401);
        $return = [];
        $i = 0;
        foreach($user->teams as $team){
            $attributes = ['id','name','owner','colour'];
            $object = $this->extractFromModel($team, $attributes);
            $object->members = count($team->members) + 1;
            $return[$i++] = $object;
        }
        $owned_teams = Team::where('owner', '=', $user->id)->get();
        foreach($owned_teams as $team){
            $attributes = ['id','name','owner','colour'];
            $object = $this->extractFromModel($team, $attributes);
            $object->members = count($team->members) + 1;
            $return[$i++] = $object;
        }
        return response()->json($return, 200);
    }
    public function update(Request $request, $id){
        $user = $this->getUserByToken($request->header('token'));
        $request = $this->createObjectFromArray($request->all());
        if(!$user)
            return response()->json(error("No user for this token"), 401);
        $team = Team::where('id', '=', $id)->first();
        if(!$team)
            return response()->json(error("Team not found"), 404);
        if($team->owner != $user->id){
            return response()->json(error("User associated with token can't access resource"), 403);
        }
        $accepted = ['name', 'colour'];
        $this->updateModelFromRequest($accepted, $team, $request);
        return response()->json([], 200);
    }
    public function delete(Request $request, $id){
        $user = $this->getUserByToken($request->header('token'));
        if(!$user)
            return response()->json(error("No user for this token"), 401);
        $team = Team::where('id','=',$id)->first();
        if(!$team)
            return response()->json(error("Team not found"), 404);
        if($user->id != $team->owner)
            return response()->json(error("User is not the owner"), 405);

        // Detach everything
        // Members
        $members = $team->members()->pluck('id')->toArray();
        $team->members()->detach($members);
        // Registrations
        $registrations = Registration::where('team','=',$id)->get();
        foreach($registrations as $registration){
            $registration->team = null;
            $registration->save();
        }
        // Invitations
        $invitations = Invitation::where('team','=',$id)->get();
        foreach($invitations as $i){
            $i->delete();
        }
        // Categories
        $categories = Category::where('team','=',$id)->get();
        foreach($categories as $c){
            $c->team = null;
            $c->save();
        }
        $team->delete();
        return response()->json([], 200);
    }
}
