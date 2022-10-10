<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CursoController extends Controller
{
    public function index(){
        return 'Hola bienvenido';
    }

    public function create(){
        return "Hola aqui podras crear un formulario";
    }

    public function show($curso){
        return "Hola bienvenido al curso de: $curso"; 
    }
}
