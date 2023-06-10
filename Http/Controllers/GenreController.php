<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Movie;
use App\Models\Genre;

class GenreController extends Controller
{
    public function loadcreatepage(){
        return view ("genre/create");
    }
    
       
    public function store(Request $request) { 

        $genre = new Genre; // Must import the Model file: use App\city;
        $genre->genre_name = $request->genre_name;       
        $genre->save(); 


        return redirect()->route('genre.view');
        }

    public function readgenre(){
    $genre = Genre::all();
    return view ("genre/read")->with(['genres'=>$genre]);
}

}
