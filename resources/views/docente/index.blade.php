@extends('layouts.plantilla')

@section('title','docente')

@section('content')
    <div class="container">
        <h1 class="text-center">Hola bienvenido a lista de docentes</h1>
        <a href="{{route('docente.create')}}" class="btn btn-info">Crear Nuevo Docente</a>
   <!-- <ul>
        @foreach ($docente as $item)
            <li>{{$item->a_nombre}}</li>
        @endforeach
    </ul> -->

    <table class="table">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">Nombre</th>
            <th scope="col">Paterno</th>
            <th scope="col">Materno</th>
            <th scope="col">Editar</th>
            <th scope="col">Eliminar</th>
            <th scope="col">Drive</th>
          </tr>
        @foreach ($docente as $item)
        </thead>
        <tbody>
          <tr>
            <th scope="row">{{$item->id}}</th>
            <td>{{$item->a_nombre}}</td>
            <td>{{$item->a_paterno}}</td>
            <td>{{$item->a_materno}}</td>
            <td><a href="{{$item->a_link}}" class="btn btn-dark" target="_blank">Drive</a></td>
            <td><a href="{{route('docente.edit', $item)}}" class="btn btn-success">Editar</a></td>
            <td><form action="{{route('docente.destroy', $item)}}" method="post"> @csrf @method('delete') <button type="submit" class="btn btn-danger">Eliminar</button></form></td>
          </tr>
        </tbody>
        @endforeach
      </table>
    </div>
@endsection



