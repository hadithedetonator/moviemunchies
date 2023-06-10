<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Director extends Model
{
    protected $primaryKey = 'director_id'; // Set as primary key
    public $incrementing = false; // Non auto-incrementing
    // public function movies()
    // {
    //     return $this->belongsToMany(Movie::class);
    // }
    public function movies()
{
    return $this->belongsToMany(Movie::class, 'director_movie');
}
}
