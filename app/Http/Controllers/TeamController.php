<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Team;

class TeamController extends APIController
{
    public function create(Request $request){
        $isset = ['team_name', 'colour'];
        $user = $this->getUserByToken($request->header('token'));
        if(!$user)
            return response()->json([], 401);
        if(!$this->fieldsSet($isset, $request))
            return response()->json([], 400);
        $team = new Team();
        $team->name = $request->team_name;
        $team->colour = $request->colour;
        $team->owner = $user->id;
        $team->save();
        return response()->json([], 200);
    }

    public function read($id){
        $team = Team::where('id', '=', $id);
        if(!$team)
            return response()->json([], 404);
        $attributes = ['id','name','owner','colour'];
        $object = $this->extractFromModel($team, $attributes);
        return response()->json($object, 200);
    }
    public function readAll(Request $request){
        $user = $this->getUserByToken($request->header('token'));
        if(!$user)
            return response()->json([], 401);
        $return = [];
        foreach($user->teams as $team){
            $attributes = ['id','name','owner','colour'];
            $object = $this->extractFromModel($team, $attributes);
            $return[] = $object;
        }
        return response()->json($return, 200);
    }
    public function update(Request $request, $id){
        $user = $this->getUserByToken($request->header('token'));
        if(!$user)
            return response()->json([], 401);
        $team = Team::where('id', '=', $id)->first();
        if($team->owner != $user->id){
            return response()->json([], 403);
        }

        $accepted = ['name', 'colour'];
        $this->updateModelFromRequest($accepted, $team, $request);
        return response()->json([], 200);
    }
    //TODO
    public function delete(Request $request, $id){
        $user = $this->getUserByToken($request->header('token'));
        if(!$user)
            return response()->json([], 401);
    }
}
