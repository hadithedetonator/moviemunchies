<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Review;
use App\Models\Movie;
use App\Models\User;
use App\Models\Comment;


class ReviewController extends Controller
 {
    // public function loadsearchpage(){
    //      $movies = Movie::all();
    //      $users = User::all();
    //      $comments = Comment::all();
    //      $reviews = Review::all();         
    //     // return view ("Review/create")->with(['movies'=>$movies],['users'=>$users]);
    //     return view("Review/create", compact('movies', 'users','comments','reviews'));
    public function loadsearchpage()
    {
        $users = User::all();
        $reviews = Review::all();
         $movies = Movie::all();

         // return view ("comment/create")->with(['movies'=>$movies],['users'=>$users]);
        return view("review/create", compact('users', 'reviews','movies'));
    }

    
       
    public function store(Request $request) { 

        $review = new Review; // Must import the Model file: use App\Review;
        $review->user_id = $request->user_id;       
        $review->movie_id = $request->movie_id;
        $review->review_text = $request->review_text;       
        $review->save();
        return redirect()->back();
        }
        


    }


    //     public function create() {
//         $movies = Movie::all(); // Load all MOives. To add in the dropdown
//         // return view ("review/create")
//         // $movie = Movie::findOrFail($movieId);

//         return view("review/create")
//         ->with(['movies' => $movies]);
//     }
   
// public function store(Request $request, $movieId)
//   {
//     $validatedData = $request->validate([
//       'rating' => 'required|integer|min:1|max:10',
//       'title' => 'required',
//       'content' => 'required',
//     ]);

//     $movie = Movie::find($movieId);

//     $review = new Review();
//     $review->rating = $validatedData['rating'];
//     $review->title = $validatedData['title'];
//     $review->content = $validatedData['content'];

//     $movie->reviews()->save($review);

//     // Optionally, you can redirect the user back to the movie page
//     return redirect('/movies/'.$movieId)->with('success', 'Review submitted successfully.');
//   }



