@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <a href="{{ route('docente.create') }}" class="btn btn-sm btn-primary mb-2">Create Teacher</a>
                <div class="card">
                    <div class="card-header">{{ __('Teacher') }}</div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>Nombre</th>
                                        <th>Paterno</th>
                                        <th>Materno</th>
                                        <th>Acciones</th>
                                    </tr>
                                    @foreach ($docente as $item)
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>{{ $item->a_nombre }}</td>
                                        <td>{{ $item->a_paterno }}</td>
                                        <td>{{ $item->a_materno }}</td>
                                        <td>
                                            <div class="btn-group">
                                                <div class="m-1">
                                                    <a href="{{ $item->a_link }}" class="btn btn-dark btn-sm"
                                                        target="_blank">Drive</a>
                                                </div>
                                                <div class="m-1">
                                                    <a href="{{ route('docente.edit', $item) }}"
                                                        class="btn btn-success btn-sm">Editar</a>
                                                </div>
                                                <div class="m-1">
                                                    <form action="{{ route('docente.destroy', $item->id) }}"
                                                        class="eliminar" method="post">@method('delete') @csrf
                                                        <button type="submit"
                                                            class="btn btn-danger btn-sm">Eliminar</button>
                                                    </form>
                                                </div>
                                                <div class="m-1">
                                                    <a href="{{ route('docente.imprimir', $item) }}" class="btn btn-dark btn-sm"
                                                        target="_blank">Imprimir</a>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                </tbody>
                                @endforeach
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
