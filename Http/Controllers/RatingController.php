<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\Rating;
use App\Models\Movie;
use Illuminate\Http\Request;
use Illuminate\Database\QueryException;
class RatingController extends Controller
{
    public function loadsearchpage(){
        $movies = Movie::all();
        $users = User::all();
        $ratings = Rating::all();
       // return view ("Rating/create")->with(['movies'=>$movies],['users'=>$users]);
       return view("rating/create", compact('movies', 'users','ratings'));
   }
      
   public function store(Request $request) { 
    // Validate the incoming request data
    $validatedData = $request->validate([
        'user_id' => 'required',
        'movie_id' => 'required',
        'rating_value' => 'required',
    ]);

    $userId = $validatedData['user_id'];
    $movieId = $validatedData['movie_id'];
    $userRating = $validatedData['rating_value'];
    try {
        $ratings = Rating::where('user_id', $userId)->where('movie_id', $movieId)->first();

        if ($ratings) {
            // User has already rated the movie
            return back()->with('error', 'You have already rated this movie.');
        }
        $rating = new Rating; // Must import the Model file: use App\rating;
       $rating->user_id = $request->user_id;       
       $rating->movie_id = $request->movie_id;
       $rating->rating_value = $request->rating_value;       
       $rating->save(); 

        return back()->with('success', 'Rating saved successfully.');
    } catch (QueryException $e) {
        // Handle other database errors
        return back()->with('error', 'Failed to save rating. Please try again.');
    }

       }
       


}
