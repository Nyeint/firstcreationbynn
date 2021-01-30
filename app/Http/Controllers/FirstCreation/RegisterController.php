<?php

namespace App\Http\Controllers\FirstCreation;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\RegisterModel;
use DB;

class RegisterController extends Controller
{
    public function register(){
         return response() ->json(RegisterModel:: get(),200);
    }
    public function showOtherProfiles($id){
        // $register=RegisterModel::find($id);
        // $register=RegisterModel::all()->excpet(RegisterModel::find($id));
        // if(is_null($register)){f
        //     return response()->json(["message" =>"Record not found"],404);
        // }
        // echo $id;
        // echo $id;
        $register=DB::table('firstcreation')
        ->select('*')
        ->where('firstcreation.id','!=',$id)
        ->get();
        
        return response() ->json($register,200);
    }
    public function registerFilter(){
        // $text='noSmoking';
        // $text1='%'.'%';
       //  echo $text1;
        // $id='8AkksFZkljhlFl0t0y2d4U4CxRY2';
        // echo "JFKLDJFKDSJ";
        // echo $_GET['gender'];
        // echo $_GET['maritalStatus'];
        // echo $_GET['heightFrom'];
        // echo $_GET['weightFrom'];
        // echo $_GET['region'];
        // echo $_GET['city'];
        // echo $GET['smoke'];
        // echo $_GET['gender'];
        // echo ${_GET['gender'].length};
       $register=DB::table('firstcreation')
       ->select('*')
       ->join('select_favourites','firstcreation.id','=','select_favourites.id')
       ->join('yesno_favourites','firstcreation.id','=','yesno_favourites.id')
    //    ->where('yesno_favourites.data','like','%noSmoking%')
       ->where('yesno_favourites.data','like',$_GET['data'])
       ->where('select_favourites.music','like',$_GET['music'])
       ->where('select_favourites.movie','like',$_GET['movie'])
       ->where('select_favourites.hobby','like',$_GET['hobby'])
       ->where('select_favourites.fashion','like',$_GET['fashion'])
       ->where('firstcreation.gender','=',$_GET['gender']==""?0:$_GET['gender'])
       ->where('firstcreation.region','=',$_GET['region']==""?0:$_GET['region'])
       ->where('firstcreation.city','=',$_GET['city']==""?0: $_GET['city'])
       ->where('firstcreation.maritalStatus','=',$_GET['maritalStatus']==""?0:$_GET['maritalStatus'])
       ->where('firstcreation.id','!=',$_GET['id'])
       ->whereBetween('firstcreation.height',[$_GET['heightFrom'],$_GET['heightTo']])
       ->whereBetween('firstcreation.weight',[$_GET['weightFrom'],$_GET['weightTo']])
       ->get();
       return response() ->json($register,200);
   }

    public function registerById($id){
        $register=RegisterModel::find($id);
        if(is_null($register)){
            return ("Record not found");
            // return("404");
            // return response()->json(["message" =>"Record not found"],404);
        }

        // if ($files = $request->file('picture')) {
        //     $path = 'images/'; 
        //     $image=$request->file('picture');
        //         $new_name=rand().'.'.$image->getClientOriginalExtension();
        //         $image->move($path,$new_name);

        //         $file_old = $path.$register->picture;
        //         unlink($file_old);
        // }
        // $register->name='Hello';
        $path = 'images/'; 
        $image=$path.$register->picture;

        $register->picture=$image;
        // return response()->download($image);

        // return gettype($register->birthday);
        return response() ->json($register,200);
    }

    public function registerSaveWithoutPicture(Request $request){
        $registerModel=RegisterModel::create($request->all());
        return response()->json($registerModel,201);
    }
    public function registerUpdateWithoutPicture(Request $request,$id){
        // $registerModel=RegisterModel::create($request->all());
        // return response()->json($registerModel,201);

        $registerModel=RegisterModel::find($id);
        if(is_null($registerModel)){
            return response()->json(["message" =>"Record not found"],404);
        }
        $registerModel->update($request->all());
        return response()->json($registerModel,201);
    }

    public function registerSave(Request $request){
        // $register=RegisterModel::create($request->all());
        $path = 'images/'; 
        $request->validate([
            'picture' => 'required|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        $image=$request->file('picture');
        $new_name=rand().'.'.$image->getClientOriginalExtension();
        $image->move($path,$new_name);
        $id = $request->input('id');
        $register=RegisterModel::create(
            [
                'id'=> $request->input('id'),
                'name'=> $request->input('name'),
                'birthday'=> $request->input('birthday'),
                'gender'=> $request->input('gender'),
                'region'=> $request->input('region'),
                'city'=> $request->input('city'),
                'occupation'=> $request->input('occupation'),
                'maritalStatus'=> $request->input('maritalStatus'),
                'height'=> $request->input('height'),
                'weight'=> $request->input('weight'),
                'skinColor'=> $request->input('skinColor'),
                'email'=> $request->input('email'),
                'password'=> $request->input('password'),
                // 'data'=>$request->input('data'),
                'picture'=>$new_name,
                // 'image'=>$photoURL
            ]
            );
        return response()->json($register,201);
    }

    public function registerUpdate(Request $request){
        $register=RegisterModel::find($request->id);
    
        if(is_null($register)){
            return response()->json(["message" =>"Record not found"],404);
        }

        if ($files = $request->file('picture')) {
            $path = 'images/'; 
            $image=$request->file('picture');
                $new_name=rand().'.'.$image->getClientOriginalExtension();
                $image->move($path,$new_name);

                $file_old = $path.$register->picture;
                unlink($file_old);
        }
        $request->picture=$new_name;
        $register->update(
            [
                'id'=> $request->input('id'),
                'name'=> $request->input('name'),
                'birthday'=> $request->input('birthday'),
                'gender'=> $request->input('gender'),
                'region'=> $request->input('region'),
                'city'=> $request->input('city'),
                'occupation'=> $request->input('occupation'),
                'maritalStatus'=> $request->input('maritalStatus'),
                'height'=> $request->input('height'),
                'weight'=> $request->input('weight'),
                'skinColor'=> $request->input('skinColor'),
                'email'=> $request->input('email'),
                'password'=> $request->input('password'),
                // 'data'=>$request->input('data'),
                'picture'=>$new_name,
                // 'image'=>$photoURL
            ]
            );
        // $register->update($request->all());
        // $register->update($registerModel);
        return response()->json($register,201);
    }
    public function registerUpdatePicture(Request $request){
        $register=RegisterModel::find($request->id);
    
        if(is_null($register)){
            return response()->json(["message" =>"Record not found"],404);
        }

        if ($files = $request->file('picture')) {
            $path = 'images/'; 
            $image=$request->file('picture');
                $new_name=rand().'.'.$image->getClientOriginalExtension();
                $image->move($path,$new_name);
        }
        $request->picture=$new_name;
        $register->update(
            [
                'id'=> $request->input('id'),
                'name'=> $request->input('name'),
                'birthday'=> $request->input('birthday'),
                'gender'=> $request->input('gender'),
                'region'=> $request->input('region'),
                'city'=> $request->input('city'),
                'occupation'=> $request->input('occupation'),
                'maritalStatus'=> $request->input('maritalStatus'),
                'height'=> $request->input('height'),
                'weight'=> $request->input('weight'),
                'skinColor'=> $request->input('skinColor'),
                'email'=> $request->input('email'),
                'password'=> $request->input('password'),
                // 'data'=>$request->input('data'),
                'picture'=>$new_name,
                // 'image'=>$photoURL
            ]
            );
        // $register->update($request->all());
        // $register->update($registerModel);
        return response()->json($register,201);
    }


    public function registerDelete(Request $request,$id){
        $register=RegisterModel::find($id);
        if(is_null($register)){
            return response()->json(["message" =>"Record not found"],404);
        }
        $register->delete();
        return response()->json(null,204);
    }

    
}
