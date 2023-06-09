<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class actors extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'description',
        'image',
    ];
    public function movies()
    {
        return $this->belongsToMany(movies::class);
    }
}
