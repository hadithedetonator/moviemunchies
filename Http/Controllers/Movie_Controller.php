<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Movie;
use App\Models\Review;
class Movie_Controller extends Controller
{
    public function create() {
        $movies = Movie::all(); // Load all genres. To add in the dropdown
        return view ("movie/create")
        ->with(['movies' => $movies]);
        }
       
public function readMovies(){
    $mvsHandler = Movie::all();

    return view ("Movie/read")->with(['movies'=>$mvsHandler]);
}
public function store(Request $request) { 

    $movie = new Movie; // Must import the Model file: use App\movie;
    $movie->title = $request->title;
    $movie->release_date = $request->release_date;
    $movie->cast = $request->cast;
    
   
    $movie->save(); 


    return redirect()->back();
    }
    public function loaddeletepage(){
        return view ('Movie/delete');
    }
    
    public function deletemovie(Request $request){
        $deletemovie = Movie::where('movie_id', $request->movie_id);
        $deletemovie->delete();
        return redirect()->back();
    }

    public function loadsearchpage(){
        $mviHandler = movie::all();
        return view ("movie/search")->with(['movies'=>$mviHandler]);
    }

public function searchmovierecord(Request $request)
    {
        $mviHandler = Movie::where("title", $request->title)->first();

        if(is_null($mviHandler))
        {
            echo nl2br("<b>Error 404:</b>\nMovie:  ". $request->title .  " Not Found...");
        }
        else
        {
            return view ("movie/edit") 
                ->with(['DEF' => $mviHandler]);
        }
    }
public function updatemovierecord(Request $request)
    {
        // $mviHandler = Movie::find($request->title);    // Find the movie based on Primary Key
        
        
        // $mviHandler->title	            = $request->title;
        // $mviHandler->release_date                = $request->release_date;
        // $mviHandler->cast	                = $request->cast	;
                
        // $mviHandler->save();

        // return redirect()->route('movie.read');

        $mviHandler = Movie::find($request->movie_id);    // Find the movie based on Primary Key

    if ($mviHandler) {
        $mviHandler->title = $request->movie_name;
        $mviHandler->release_date = $request->release_date;
        $mviHandler->cast = $request->cast;
                
        $mviHandler->save();

        return redirect()->route('mview');

    }



    }
}   