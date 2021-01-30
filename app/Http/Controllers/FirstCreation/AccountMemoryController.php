<?php

namespace App\Http\Controllers\FirstCreation;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\AccountMemoryModel;

class AccountMemoryController extends Controller
{
    public function accountMemory(){
        return response() ->json(AccountMemoryModel:: get(),200);
    }

    public function accountMemoryById($id){
        $accountMemory=AccountMemoryModel::find($id);
        if(is_null($accountMemory)){
            return response()->json(["message" =>"Record not found"],404);
            // return 404;
        }
        return response() ->json($accountMemory,200);
    }

    public function accountMemorySave(Request $request){
        $accountMemory=AccountMemoryModel::create($request->all());
        return response()->json($accountMemory,201);
    }

    public function accountMemoryUpdate(Request $request,$id){
        $accountMemory=AccountMemoryModel::find($id);
        if(is_null($accountMemory)){
            return response()->json(["message" =>"Record not found"],404);
        }
        $accountMemory->update($request->all());
        return response()->json($accountMemory,201);
    }

    public function accountMemoryDelete(Request $request,$id){
        $accountMemory=AccountMemoryModel::find($id);
        if(is_null($accountMemory)){
            return response()->json(["message" =>"Record not found"],404);
        }
        $accountMemory->delete();
        return response()->json(null,204);
    }
    
}
