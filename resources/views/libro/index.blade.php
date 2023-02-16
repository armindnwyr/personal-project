@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <a href="{{ route('libro.create') }}" class="btn btn-sm btn-primary mb-2">Create book</a>
            <div class="card">
                <div class="card-header">{{ __('Libro') }}</div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table  class="table table-bordered table-hover">
                            <thead>
                             <tr>
                                 <th>Titulo</th>
                                 <th>Editorial</th>
                                 <th>Año</th>
                                 <th>Idioma</th>
                                 <th>Acciones</th>
                             </tr>
                            </thead>
                            <tbody>
                             @foreach ($libro as $item)
                                 <tr>
                                     <td>{{ $item->titulo }}</td>
                                     <td>{{ $item->editorial }}</td>
                                     <td>{{ $item->anio }}</td>
                                     <td>{{ $item->idioma }}</td>
                                     <td>
                                         <div class="btn-group">
                                             <div class="p-2">
                                             <a href="{{ route('libro.edit', $item->id) }}" class="btn btn-sm btn-success">Editar</a>
                                             </div>
                                             <div class="p-2">
                                             <form action="{{ route('libro.destroy', $item->id) }}" method="post">
                                             @csrf
                                             @method('delete')
                                         <button type="submit" class="btn btn-sm btn-danger">Eliminar</button>
                                         </form>
                                         </div>
                                         </div>
                                     </td>
                                 </tr>
                             @endforeach
                            </tbody>
                         </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection