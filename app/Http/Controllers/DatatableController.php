<?php

namespace App\Http\Controllers;

use App\Models\Autor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Rmunate\EasyDatatable\EasyDataTable;

class DatatableController extends Controller
{
    public function data()
    {
        $data = DB::table('autors')->select('id','nombres','apellidos','bibliografia');
        
        $datatable = new EasyDataTable();
        $datatable->clientSide();
        $datatable->query($data);

        $datatable->map(function($row){
            return [
                'id' => $row->id, 
                'nombres'       => $row->nombres,
                'apellidos'   => $row->apellidos,
                'bibliografia'    => $row->bibliografia,
                "action" => [
                    "editar" => route('autor.edit',$row->id),
                    "eliminar" => route('autor.destroy',$row->id)
                ]
            ];
        });

        return $datatable->response();;
    }
}
