@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <a href="{{ route('post.create') }}" class="btn btn-primary btn-sm mb-2">Create Post</a>
                <div class="card">
                    <div class="card-header">{{ __('Publicaciones') }}</div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>Titulo</th>
                                        <th>Postear</th>
                                        <th>Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($post as $ps)
                                        <tr>
                                            <td>{{ $ps->titulo }}</td>
                                            <td>
                                                @if ($ps->postear == false)
                                                <span class="badge badge-primary" style="background: rgb(10, 128, 120)">No publicado</span>
                                                @else
                                                <span class="badge badge-primary" style="background: rgb(126, 205, 7)">Publicado</span>
                                                @endif
                                            </td>
                                            <td class="d-flex">
                                                @if ($ps->postear == false)
                                                <a class="btn btn-sm btn-info m-2" href="{{ route('post.publish', $ps->id) }}">Publicar</a>
                                                @else
                                                <a class="btn btn-sm btn-warning m-2" href="{{ route('post.publish', $ps->id) }}"> No publicar</a>
                                                @endif
                                                <a class="btn btn-sm btn-success m-2" href="{{ route('post.edit', $ps->id) }}">Editar</a>
                                                <form action="{{ route('post.destroy', $ps->id) }}" method="post">
                                                    @csrf @method('delete')
                                                    <button type="submit" class="btn btn-sm btn-danger m-2">Eliminar</button></form>
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

