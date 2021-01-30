<?php

namespace App\Http\Controllers\FirstCreation;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\WriteDownFavouritesModel;

class WriteDownFavouritesController extends Controller
{
    public function writedownFavourites(){
        return response() ->json(WriteDownFavouritesModel:: get(),200);
    }

    public function writedownFavouritesById($id){
        $writedownFavourites=WriteDownFavouritesModel::find($id);
        if(is_null($writedownFavourites)){
            return response()->json(["message" =>"Record not found"],404);
        }
        return response() ->json($writedownFavourites,200);
    }

    public function writedownFavouritesSave(Request $request){
        $writedownFavourites=WriteDownFavouritesModel::create($request->all());
        return response()->json($writedownFavourites,201);
    }
    // public function countrySave(){
    //     $fileName="user_image.jpg";
    //     // $path=$request->file('photo')->move(public_path("/"),$fileName);
    //     $photoURL=url('/'.$fileName);
    //     return response()->json(['url' => $photoURL],200);
    // }

    public function writedownFavouritesUpdate(Request $request,$id){
        $writedownFavourites=WriteDownFavouritesModel::find($id);
        if(is_null($writedownFavourites)){
            return response()->json(["message" =>"Record not found"],404);
        }
        $writedownFavourites->update($request->all());
        return response()->json($writedownFavourites,201);
    }

    public function writedownFavouritesDelete(Request $request,$id){
        $writedownFavourites=WriteDownFavouritesModel::find($id);
        if(is_null($writedownFavourites)){
            return response()->json(["message" =>"Record not found"],404);
        }
        $writedownFavourites->delete();
        return response()->json(null,204);
    }
    
}
