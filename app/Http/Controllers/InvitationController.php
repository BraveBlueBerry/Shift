<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Invitation;
use App\Models\User;
use App\Models\Team;

class InvitationController extends APIController
{
    public function create(Request $request){
        $isset = ['team', 'email', 'message'];
        $owner = $this->getUserByToken($request->header('token'));
        if(!$owner)
            return response()->json(error("No user for this token"), 401);
        $team = Team::where('id', '=', $request->team)->first();
        if(!$team)
            return response()->json(error("The team for the specified id doesn't exist"), 404);
        $user = User::where('email', '=', $request->email)->first();
        if(!$user)
            return response()->json(error("The invited user doesn't exist"), 404);
        if(!$this->fieldsSet($isset, $request))
            return response()->json(error("Fields missing: 'team', 'email' and 'message' must be set."), 400);

        $already_in_teams = $user->teams->toArray();
        foreach($already_in_teams as $user_team){
            if($user_team['id'] == $team->id){
                return response()->json(error("Trying to invite a team member to the same team"), 409);
            }
        }
        $invitation = new Invitation();
        $invitation->team = $team->id;
        $invitation->user = $user->id;
        $invitation->message = $request->message;
        $invitation->save();
        return response()->json([], 200);
    }
    public function readAll(Request $request){
        $user = $this->getUserByToken($request->header('token'));
        if(!$user)
            return response()->json(error("No user for this token"), 401);
        return response()->json($user->invitations->toArray(), 200);
    }
    public function delete(Request $request, $id){
        $isset = ['response'];
        $user = $this->getUserByToken($request->header('token'));
        if(!$user)
            return response()->json(error("No user for this token"), 401);
        $invitation = Invitation::where('id','=',$id)->where('user','=',$user->id)->first();
        if(!$invitation)
            return response()->json(error("Invitation doesn't exist."), 404);
        $request = $request->all();
        if(!array_key_exists("response", $request))
            return response()->json(error("Fields missing: 'response' must be set."), 400);
        if(!in_array($request['response'], ['accept', 'decline']))
            return response()->json(error("Response must be 'accept' or 'decline'."), 400);

        if($request['response'] == 'accept'){
            $invitation->team_object->members()->attach($user);
        }

        $invitation->delete();
        return response()->json([], 200);
    }
}
