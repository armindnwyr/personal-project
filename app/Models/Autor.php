<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Autor extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'nombres',
        'apellidos',
        'bibliografia',
    ];

    public function libro(){
        return $this->belongsToMany(Libro::class);
    }
}
