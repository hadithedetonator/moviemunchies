<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Movie_Controller;
use App\Http\Controllers\UserController;
use App\Http\Controllers\directorController;
use App\Http\Controllers\ProducerController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\RatingController;
use App\Http\Controllers\mailController;
//for mailing
use Illuminate\Support\Facades\Mail;
use App\Http\Controllers\FileController;


use App\Mail\form_mail;


use App\Http\Controllers\CommentController;

use App\Http\Controllers\GenreController;


Route::get('/', function () {
    return view('welcome');
});


/*
Creating record in User TABLE
*/
Route::get('User/create', [UserController::class, 'loadcreatepage']);
Route::post('User/store', [UserController::class, 'store'])->name('user.store');
/*
DELETING RECORDS
*/
Route::get('User/delete', [UserController::class, 'loaddeletepage']);
Route::post('User/deleted', [UserController::class, 'deleteuser'])->name('user.delete');
/*
READING FROM User TABLE
*/
Route::get('User/read', [UserController::class, 'readUsers'])->name('view');
/*
Updating in User TABLE
*/
Route::get('User/search', [UserController::class, 'loadsearchpage']);
Route::post('User/search', [UserController::class, 'searchuserrecord'])->name('user.search');
Route::post('User/updated', [UserController::class, 'updateuserrecord'])->name('user.update');


/* Movie */

/*
Creating record in Movie TABLE
*/  
Route::get('Movie/create', [Movie_Controller::class, 'create']);
Route::post('Movie/store', [Movie_Controller::class, 'store'])->name('movie.store');
/*


/*
READING FROM MOVIES TABLE
*/
Route::get('Movie/read', [Movie_Controller::class, 'readMovies'])->name('mview');
/*
DELETING RECORDS
*/
Route::get('Movie/delete', [Movie_Controller::class, 'loaddeletepage']);
Route::post('Movie/deleted', [Movie_Controller::class, 'deletemovie'])->name('movie.delete');

/*
Updating in Movie TABLE
*/
Route::get('Movie/search', [Movie_Controller::class, 'loadsearchpage']);
Route::post('Movie/search', [Movie_Controller::class, 'searchmovierecord'])->name('movie.search');
Route::post('Movie/updated', [Movie_Controller::class, 'updatemovierecord'])->name('movie.update');

/*
Creating record in director TABLE
*/
Route::get('director/create', [directorController::class, 'loadcreatepage']);
Route::post('director/store', [directorController::class, 'store'])->name('director.store');

/*
READING FROM User TABLE
*/
Route::get('director/read', [directorController::class, 'readdirectors'])->name('director.view');


/*
READING FROM Gnre TABLE
*/
Route::get('genre/read', [genreController::class, 'readgenre'])->name('genre.view');
/*
Creating record in genre TABLE
*/
Route::get('genre/create', [genreController::class, 'loadcreatepage']);
Route::post('genre/store', [genreController::class, 'store'])->name('genre.store');


/*
READING FROM producer TABLE
*/
Route::get('producer/read', [ProducerController::class, 'readproducer'])->name('producer.view');
/*
Creating record in genre TABLE
*/
Route::get('producer/create', [ProducerController::class, 'loadcreatepage']);
Route::post('producer/store', [ProducerController::class, 'store'])->name('producer.store');
//BUSINESSS TRANSACTOINS


//adding areview
Route::get('review/create', [ReviewController::class, 'loadsearchpage']);
Route::post('review/store', [ReviewController::class, 'store'])->name('review.store');



//Creating record in comment TABLE

Route::get('comment/create', [CommentController::class, 'loadsearchpage']);
Route::post('comment/store', [CommentController::class, 'store'])->name('comment.store');


//Creating record in comment TABLE

Route::get('rating/create', [RatingController::class, 'loadsearchpage']);
Route::post('rating/store', [RatingController::class, 'store'])->name('rating.store');


//MAILING 

// Route::get('/send_mail', function(){
//     Mail::to('ahmed129902786@gmail.com')
//     ->send(new form_mail());
//     });

//second way

Route::get('/mail_form', [mailController::class, 'open_form' ])
->name('mail_form');
Route::post('/send_mail', [mailController::class, 'send_mail'])
->name('send_mail');
    

//file uploading

Route::get('/file_upload', [FileController::class,'open_file_form']);
Route::post('/file_store', [FileController::class,'store_file']);

//viewing and downloading files

Route::get('/show_data', [FileController::class, 'show_file_data']);

Route::get('/view_file/{id}', [FileController::class, 'file_view']);

Route::get('/download_file/{file}', [FileController::class,
'file_download']);