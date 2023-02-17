@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="mb-2">
                    <a href="{{ route('autor.create')}}" class="btn btn-sm btn-primary">Create</a>
                </div>
                <div class="card">
                    <div class="card-header">{{ __('Autors') }}</div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>Nombre</th>
                                        <th>Apellido</th>
                                        <th>Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($autor as $item)
                                        <tr>
                                            <td>{{ $item->nombres }}</td>
                                            <td>{{ $item->apellidos }}</td>
                                            <td>
                                                <div class="btn-group">
                                                    <div class="m-2">
                                                        <a href="{{ route('autor.edit', $item->id) }}"
                                                            class="btn btn-sm btn-success">Editar</a>
                                                    </div>
                                                    <div class="m-2">
                                                        <form action="{{ route('autor.destroy', $item->id) }}" method="post">
                                                            @csrf @method('delete')
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
