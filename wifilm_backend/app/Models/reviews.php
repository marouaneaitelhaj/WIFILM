<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class reviews extends Model
{
    use HasFactory;
    public function movies()
    {
        return $this->belongsTo(movies::class);
    }
    public function users()
    {
        return $this->belongsTo(User::class);
    }
}
