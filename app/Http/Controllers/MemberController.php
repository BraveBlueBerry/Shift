<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Team;

class MemberController extends APIController
{
    public function readAll(Request $request, $team_id){
        $user = $this->getUserByToken($request->header('token'));
        if(!$user)
            return response()->json(error("No user for this token"), 401);
        $team = Team::where('id', '=', $team_id)->first();
        if(!$team)
            return response()->json(error("The team for the specified id doesn't exist"), 404);
        $members = $team->members->toArray();
        $user_id_list = [$team->owner];
        foreach($members as $m){
            $user_id_list[] = $m['id'];
        }
        if(!in_array($user->id, $user_id_list))
            return response()->json(error("Token owner isn't part of the team"), 403);
        return response()->json($members, 200);
    }
    public function delete(Request $request, $team_id, $user_id){
        $user = $this->getUserByToken($request->header('token'));
        if(!$user)
            return response()->json(error("No user for this token"), 401);
        $team = Team::where('id', '=', $team_id)->first();
        if(!$team)
            return response()->json(error("The team for the specified id doesn't exist."), 404);
        if($team->owner != $user->id)
            return response()->json(error("Token owner isn't owner of the team."), 403);
        $members = $team->members->toArray();
        $user_id_list = [];
        foreach($members as $m){
            $user_id_list[] = $m['id'];
        }
        if(!in_array($user_id, $user_id_list))
            return response()->json(error("User is not part of the team."), 404);
        $team->members()->detach($user_id);
        $team = Team::where('id', '=', $team_id)->first();
        return response()->json($team->members, 200);
    }

}
