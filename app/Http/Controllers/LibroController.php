<?php

namespace App\Http\Controllers;

use App\Models\Autor;
use App\Models\Libro;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class LibroController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $libro = Libro::select('*')->orderBy('id','desc')->get();
        // dd($libro);
        return view('libro.index', compact('libro'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $autor = Autor::all();
        return view('libro.create', ['autor' => $autor]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'titulo' => 'required',
            'editorial' => 'required',
            'isbn' => 'required',
            'anio' => 'required',
            'paginas' => 'required',
            'idioma' => 'required',
            'resumen' => 'required',
            'autor_id' => 'required',
        ]);

        Libro::create([
            'titulo' => $request->titulo,
            'editorial' => $request->editorial,
            'isbn' => $request->isbn,
            'anio' => $request->anio,
            'paginas' => $request->paginas,
            'idioma' => $request->idioma,
            'resumen' => $request->resumen,
            'autor_id' => json_decode($request->autor_id),
        ]);

        return Redirect::route('libro.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Libro $libro)
    {
        return view('libro.edit', ['libro'=>$libro]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Libro $libro)
    {
        $request->validate([
            'titulo' => 'required',
            'editorial' => 'required',
            'isbn' => 'required',
            'anio' => 'required',
            'paginas' => 'required',
            'idioma' => 'required',
            'resumen' => 'required',
        ]);

        $libro->update([
            'titulo' => $request->titulo,
            'editorial' => $request->editorial,
            'isbn' => $request->isbn,
            'anio' => $request->anio,
            'paginas' => $request->paginas,
            'idioma' => $request->idioma,
            'resumen' => $request->resumen,
        ]);

        return Redirect::route('libro.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Libro $libro)
    {
        $libro->delete();

        return Redirect::route('libro.index');
    }
}
