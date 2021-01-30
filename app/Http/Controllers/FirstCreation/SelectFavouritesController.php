<?php

namespace App\Http\Controllers\FirstCreation;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\SelectFavouritesModel;

class SelectFavouritesController extends Controller
{
    public function selectFavourites(){
        return response() ->json(SelectFavouritesModel:: get(),200);
    }

    public function selectFavouritesById($id){
        $SelectFavourites=SelectFavouritesModel::find($id);
        if(is_null($SelectFavourites)){
            return response()->json(["message" =>"Record not found"],404);
            // return 404;
        }
        return response() ->json($SelectFavourites,200);
    }

    public function selectFavouritesSave(Request $request){
        $SelectFavourites=SelectFavouritesModel::create($request->all());
        return response()->json($SelectFavourites,201);
    }

    public function selectFavouritesUpdate(Request $request,$id){
        
        $SelectFavourites=SelectFavouritesModel::find($id);
        if(is_null($SelectFavourites)){
            return response()->json(["message" =>"Record not found"],404);
        }
        $SelectFavourites->update($request->all());
        return response()->json($SelectFavourites,201);
    }

    public function selectFavouritesDelete(Request $request,$id){
        $SelectFavourites=SelectFavouritesModel::find($id);
        if(is_null($SelectFavourites)){
            return response()->json(["message" =>"Record not found"],404);
        }
        $SelectFavourites->delete();
        return response()->json(null,204);
    }
    
}
