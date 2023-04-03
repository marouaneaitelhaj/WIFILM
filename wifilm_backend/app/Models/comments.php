<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class comments extends Model
{
    use HasFactory;
    public function movie()
    {
        return $this->belongsTo(movies::class);
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
