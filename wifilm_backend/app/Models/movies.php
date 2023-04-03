<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class movies extends Model
{
    use HasFactory;
    public function comments()
    {
        return $this->hasMany(comments::class);
    }
    public function genres()
    {
        return $this->belongsToMany(genres::class);
    }
    public function actors()
    {
        return $this->belongsToMany(actors::class);
    }
    public function reviews()
    {
        return $this->hasMany(reviews::class);
    }
}
