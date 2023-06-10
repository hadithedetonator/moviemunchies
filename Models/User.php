<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    protected $primaryKey = 'user_id'; // Set as primary key
    public $incrementing = false; // Non auto-incrementing
    

   
    public function review()
    {
        return $this->hasMany(Review::class);
    }
    public function comment()
    {
        return $this->hasMany(Comment::class);
    }
    public function rating()
    {
        return $this->hasOne(Rating::class);
    }
}
