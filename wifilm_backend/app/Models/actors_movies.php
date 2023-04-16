<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class actors_movies extends Model
{
    use HasFactory;

    protected $fillable = [
        'actors_id',
        'movies_id',
    ];
}
