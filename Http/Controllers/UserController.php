<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\director;

use App\Models\Review;


class UserController extends Controller
{
    public function loadcreatepage(){
        
        $users = User::all(); 
        return view ("User/create")->with((['users' => $users]));
    }




    public function store(Request $request) { 

        $user = new User; // Must import the Model file: use App\user;
        $user->user_name = $request->name;
        $user->email = $request->email;
        $user->password = $request->password;
       
        $user->save(); 


        return redirect()->back();
        }

//DELetion
public function loaddeletepage(){
    return view ('User/delete');
}

public function deleteuser(Request $request){
    $deleteuser = User::where('user_id', $request->user_id);
    $deleteuser->delete();
    return redirect()->route('view');
}
//rEADINg from user

public function readUsers(){
    $usrHandler = User::all();
    return view ("User/read")->with(['users'=>$usrHandler]);
}
public function create() {
    $users = User::all(); // Load all cities. To add in the dropdown
    return view ("user/create")
    ->with(['users' => $users]);
    }
//updating user


public function loadsearchpage(){
        //$usrHandler = User::all();
        return view ("User/search");//->with(['users'=>$usrHandler]);
    
    }

public function searchuserrecord(Request $request)
    {
        $usrHandler = User::where("user_id", $request->user_id)->first();

        if(is_null($usrHandler))
        {
            echo nl2br("<b>Error 404:</b>\nUser ID: . ". $request->user_id . " Not Found...");
        }
        else
        {
            return view ("User/edit") 
                ->with(['DEF' => $usrHandler]);
        }
    }
public function updateuserrecord(Request $request)
    
            // Find the User based on Primary Key
        /*$usrHandler = User::where('user_id', $request->user_id)->first();
        $usrHandler->user_id            = $request->user_id;
        $usrHandler->user_name            = $request->user_name;
        $usrHandler->email                = $request->email;
        $usrHandler->password                = $request->password; */
    {
       // $usrHandler = DB::select('SELECT * FROM users WHERE user_id = ?', [$request->user_id]);//User::find($request->user_id);
       // $usrHandler = User::where('user_id',$request->user_id)->first();
       $usrHandler = User::find($request->user_id)->first();
        $usrHandler->user_name = $request->user_name;
        $usrHandler->email = $request->email;
        $usrHandler->password = $request->password;
        $usrHandler->save();


        return redirect()->route('view');

    }

    
}