<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Movie extends Model
{
    protected $primaryKey = 'movie_id'; // Set as primary key
    public $incrementing = false; // Non auto-incrementing
    public function directors()
    {
        return $this->belongsToMany(Director::class,'movie_directed');
    }
    public function producers()
    {
        return $this->belongsToMany(Producer::class, 'movie_produced');
    }
    public function genres()
    {
        return $this->belongsToMany(Genre::class,'movie_genres');
    }
    public function reviews()
    {
        return $this->hasMany(Review::class, 'movie_id');
    }
    public function rating()
    {
        return $this->hasMany(Rating::class,'rating_id');
    }
}
