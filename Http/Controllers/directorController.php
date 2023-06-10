<?php

namespace App\Http\Controllers;
use App\Models\Director;
use Illuminate\Http\Request;

class directorController extends Controller
{
    public function loadcreatepage(){
        return view ("director/create");
    }
    
       
    public function store(Request $request) { 

        $director = new Director; // Must import the Model file: use App\city;
        $director->director_name = $request->director_name;       
        $director->save(); 


        return redirect()->route('director.view');
        }

    public function readdirectors(){
    $director = director::all();
    return view ("director/read")->with(['directors'=>$director]);
}

}
