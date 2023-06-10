<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Comment;
use App\Models\Review;
use App\Models\User;

class CommentController extends Controller
 {
    public function loadsearchpage(){
         $reviews = Review::all();
         $users = User::all();
         $comments = Comment::all();
        // return view ("comment/create")->with(['movies'=>$movies],['users'=>$users]);
        return view("comment/create", compact('reviews', 'users','comments'));
    }
       
    public function store(Request $request) { 

        $comment = new Comment; // Must import the Model file: use App\comment;
        $comment->user_id = $request->user_id;       
        $comment->review_id = $request->review_id;
        $comment->comment_text = $request->comment_text;       
        $comment->save();
        return redirect()->back();
        }
        


    }


    //     public function create() {
//         $movies = Movie::all(); // Load all MOives. To add in the dropdown
//         // return view ("comment/create")
//         // $movie = Movie::findOrFail($movieId);

//         return view("comment/create")
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

//     $comment = new comment();
//     $comment->rating = $validatedData['rating'];
//     $comment->title = $validatedData['title'];
//     $comment->content = $validatedData['content'];

//     $movie->reviews()->save($comment);

//     // Optionally, you can redirect the user back to the movie page
//     return redirect('/movies/'.$movieId)->with('success', 'comment submitted successfully.');
//   }



