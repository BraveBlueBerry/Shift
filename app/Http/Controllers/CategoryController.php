<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends APIController
{
    public function create(Request $request){
        $isset = ['name', 'colour']; // team could also be set
        $user = $this->getUserByToken($request->header('token'));
        if(!$user)
            return response()->json([], 401);
        if(!$this->fieldsSet($isset, $request))
            return response()->json([], 400);
        $isset = ['team'];
        $category = new Category();
        if(!$this->fieldsSet($isset, $request)){
            $category->user = $user->id;
        }
        else {
            $team = Team::where('id', '=', $request->team)->first();
            if(!$team)
                return response()->json([], 400);
            if(!$team->owner != $user->id)
                return response()->json([], 403);
            $category->team = $team->id;
        }
        $category->name = $request->name;
        $category->colour = $request->colour;
        $category->save();
        return response()->json([], 200);
    }
    public function read($id){

    }
    public function readAllTeam($team_id){

    }
    public function readAll(){

    }
    public function update(Request $request, $id){

    }
    public function delete($id){

    }
}
