<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class actormovie extends Model
{
    use HasFactory;
    public function actor()
    {
        return $this->belongsTo(actors::class);
    }
    public function movie()
    {
        return $this->belongsTo(movies::class);
    }
}
