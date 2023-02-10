<?php

namespace App\Http\Controllers;

use App\Models\armind;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Js;

class ArmindController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $docente = armind::orderBy('id', 'desc')->paginate(); //::paginate(); para mostrar solo una cantidad de datos

        return view('docente.index', compact('docente'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('docente.create');
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
            'nombre' => 'required',
            'paterno' => 'required',
            'materno' => 'required',
            'link' => 'required',
        ]);

        //return $request->all();
        $docente = new Armind();

        $docente->a_nombre = $request->nombre;
        $docente->a_paterno = $request->paterno;
        $docente->a_materno = $request->materno;
        $docente->a_link = $request->link;

        $docente->save();

        return redirect()->route('docente.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\armind  $armind
     * @return \Illuminate\Http\Response
     */
    public function show(Armind $docente)
    {
        return view('docente.index', compact('docente'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\armind  $armind
     * @return \Illuminate\Http\Response
     */
    public function edit(Armind $docente)
    {
        //return $docente;
        return view('docente.edit', compact('docente'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\armind  $armind
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Armind $docente, $suma)
    {
        $request->validate([
            'nombre' => 'required',
            'paterno' => 'required',
            'materno' => 'required',
            'link' => 'required',
        ]);

        $docente->a_nombre = $request->nombre;
        $docente->a_paterno = $request->paterno;
        $docente->a_materno = $request->materno;
        $docente->a_link = $request->link;

        //return $docente;

        $docente->save();

        return redirect()->route('docente.index');
    }

    public function imprimir($id)
    {
        $docente = Armind::find($id);
        $pdf = App::make('dompdf.wrapper');
        $pdf = pdf::loadView('docente.print', compact('docente'))->save(storage_path('app/public/docente/') . $docente->a_nombre . '.pdf');
        return $pdf->stream();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\armind  $armind
     * @return \Illuminate\Http\Response
     */
    public function destroy(Armind $docente)
    {
        $docente->delete();

        return back();
    }

    public function search(Request $request)
    {
        $data = '';
        $search = $request->get('search');
        if($search != ''){
            $data = DB::table('arminds')->where('a_nombre','like','%'.$search.'%')
            ->orWhere('a_paterno','like','%' .$search. '%')->get();
        }

        return json_decode($data);
    }
}
