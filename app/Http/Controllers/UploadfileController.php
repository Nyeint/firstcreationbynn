<?php 
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Models\YesNoFavouritesModel;

class UploadfileController extends Controller{
    function index(){
        return view('upload');
    }

    function upload(Request $request){
        $this->validate($request,[
            'select_file'=>'required|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);
        $image=$request->file('select_file');
        $new_name=rand().'.'.$image->getClientOriginalExtension();
        $image->move(public_path("images"),$new_name);

        // $yesnoFavourites=yesNoFavouritesModel::create($request->all());
         $yesnoFavourites=yesNoFavouritesModel::create(
            [
                'id'=> '12',
                // 'data'=>$request->input('data'),
                'data'=>$image,
                'name' => $new_name,
                // 'image'=>$photoURL
            ]
            );

        return back()->with('success','Image is Uploaded Successfully.')->with('path',$new_name );
    }
}