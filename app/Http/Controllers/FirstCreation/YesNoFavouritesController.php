<?php

namespace App\Http\Controllers\FirstCreation;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\YesNoFavouritesModel;

class YesNoFavouritesController extends Controller
{
    public function yesNoFavourites(){
        return response() ->json(YesNoFavouritesModel:: get(),200);
    }

    public function yesNoFavouritesById($id){
        $yesnoFavourites=yesNoFavouritesModel::find($id);
        if(is_null($yesnoFavourites)){
            return response()->json(["message" =>"Record not found"],404);
        }
        return response() ->json($yesnoFavourites,200);

        // return response()->download(public_path('first_logo.gif','User Image'));
    }

    public function yesNoFavouritesSave(Request $request){
        $yesnoFavourites=yesNoFavouritesModel::create($request->all());
        return response()->json($yesnoFavourites,201);
        // $request->validate([
        //     'data' => 'mimes:jpeg,png,jpg,gif,svg|max:2048',
        // ]);
        // $destinationPath = 'public/image/';
        // $image=$request->file('data');
        // $new_name=rand().'.'.$image->getClientOriginalExtension();
        // $image->move($destinationPath,$new_name);
        // $id = $request->input('id');
        // $yesnoFavourites=yesNoFavouritesModel::create(
        //     [
        //         'id'=>$id,
        //         // 'data'=>$request->input('data'),
        //         'data'=>$image,
        //         'name' => $new_name,
        //         // 'image'=>$photoURL
        //     ]
        //     );
        // return response()->json($yesnoFavourites,201);
    }
    

    public function yesNoFavouritesUpdate(Request $request,$id){

        $yesnoFavourites=yesNoFavouritesModel::find($id);
        if(is_null($yesnoFavourites)){
            return response()->json(["message" =>"Record not found"],404);
        }
        $yesnoFavourites->update($request->all());
        return response()->json($yesnoFavourites,201);
      
}
}