<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Libro extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'titulo',
        'paginas',
        'editorial',
        'isbn',
        'anio',
        'idioma',
        'resumen',
    ];

    public function autor(){
        return $this->belongsToMany(Autor::class);
    }
}
