<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    protected $primaryKey = 'review_id'; // Set as primary key
    public $incrementing = false; // Non auto-incrementing

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function comment()
    {
        return $this->hasMany(Comment::class,'comment_id');
    }
    public function movie()
    {
        return $this->belongsTo(Movie::class, 'movie_id');
    }


}
