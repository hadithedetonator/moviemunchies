<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Movie;
use App\Models\Producer;


class ProducerController extends Controller
{
    public function loadcreatepage(){
        return view ("producer/create");
    }
    
       
    public function store(Request $request) { 

        $producer = new Producer; // Must import the Model file: use App\city;
        $producer->producer_name = $request->producer_name;       
        $producer->save(); 


        return redirect()->route('producer.view');
        }

    public function readproducer(){
    $producers = Producer::all();
    return view ("producer/read")->with(['producers'=>$producers]);
}

}
