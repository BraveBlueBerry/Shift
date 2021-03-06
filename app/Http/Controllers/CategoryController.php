<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Team;

class CategoryController extends APIController
{
    public function create(Request $request){
        $isset = ['name', 'colour']; // team could also be set
        $user = $this->getUserByToken($request->header('token'));
        if(!$user)
            return response()->json(error("Token not set or not valid"), 401);
        if(!$this->fieldsSet($isset, $request))
            return response()->json(error("Fields 'name' and 'colour' need to be submitted."), 400);
        $isset = ['team'];
        $category = new Category();
        if(!$this->fieldsSet($isset, $request)){
            $category->user = $user->id;
        }
        else {
            $team = Team::where('id', '=', $request->team)->first();
            if(!$team)
                return response()->json(error("Team doesn't exist"), 404);
            if($team->owner != $user->id)
                return response()->json(error("Only owners can add categories to a team"), 403);
            $category->team = $team->id;
        }
        $category->name = $request->name;
        $category->colour = $request->colour;
        $category->save();
        return response()->json([], 200);
    }
    public function createForTeam(Request $request, $team_id){
        $request->team = $team_id;
        return $this->create($request);
    }
    public function read(Request $request, $id){
        $user = $this->getUserByToken($request->header('token'));
        if(!$user)
            return response()->json(error("Token not set or not valid"), 401);
        $category = Category::where('id','=',$id)->first();
        if(!$category)
            return response()->json(error("Category doesn't exist"), 404);
        if($category->team){
            $team = Team::where('id','=',$category->team)->first();
            $members = $team->members()->pluck('id')->toArray();
            $members[] = $team->owner;
            if(!in_array($user->id, $members)){
                return response()->json(error("Not part of team"), 403);
            }
            $attributes = ['id','team','name','colour'];
            return response()->json($this->extractFromModel($category, $attributes), 200);
        }
        else{
            if($user->id != $category->user)
                return response()->json(error("Not the token owner their category"), 403);
            $attributes = ['id','user','name','colour'];
            return response()->json($this->extractFromModel($category, $attributes), 200);
        }
    }
    public function readAllTeam(Request $request, $team_id){
        $team = Team::where('id','=',$team_id)->first();
        if(!$team)
            return response()->json(error("Team doesn't exist "), 404);
        $user = $this->getUserByToken($request->header('token'));
        if(!$user)
            return response()->json(error("Token not set or not valid"), 401);
        $members = $team->members()->pluck('id')->toArray();
        $members[] = $team->owner;
        if(!in_array($user->id, $members)){
            return response()->json(error("Not part of team"), 403);
        }
        $categories = $team->categories->toArray();
        return response()->json($categories, 200);
    }
    public function readAll(Request $request){
        $user = $this->getUserByToken($request->header('token'));
        if(!$user)
            return response()->json(error("Token not set or not valid"), 401);
        $user = $this->getUserByToken($request->header('token'));
        $categories = $user->categories->toArray();
        return response()->json($categories, 200);
    }
    public function update(Request $request, $id){
        /*$user = $this->getUserByToken($request->header('token'));
        if(!$user)
            return response()->json(error("Token not set or not valid"), 401);
        $request = $this->createObjectFromArray($request->all());
        */
       return response()->json(error("Not implemented"), 500);
    }
    public function delete(Request $request, $id){
        $user = $this->getUserByToken($request->header('token'));
        if(!$user)
            return response()->json(error("Token not set or not valid"), 401);
        return response()->json(error("Not implemented"), 500);
    }
}
