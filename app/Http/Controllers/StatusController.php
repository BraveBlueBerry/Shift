<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Status;

class StatusController extends APIController
{
    public function read(Request $request, $id){
        $status = Status::where('id','=',$id)->first();
        if(!$status)
            return response()->json("Status does not exist", 404);
        return response()->json($status, 200);
    }
    public function readAll(Request $request){
        $status = Status::get();
        return response()->json($status->toArray(), 200);
    }
}
