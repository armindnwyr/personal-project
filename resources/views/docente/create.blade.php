@extends('layouts.plantilla')

@section('title','Create')
    
@section('content')
    <h1 class="text-center">Bienvenido a para crear nuevo docente</h1>
    <div class="container">
    <a href="{{route('docente.store')}}" class="btn btn-info">Regresar Lista Docente</a>
    
        <form action="{{route('docente.store')}}" method="post">
            @csrf
            <div class="form-row">
              <div class="form-group col-md-6 mt-2">
                <label for="inputEmail4">Nombre</label>
                <input type="text" class="form-control" id="inputEmail4" name="nombre" value="{{old('nombre')}}">
                  @error('nombre')
                  <small class="text-danger">{{$message}}</small>
                  @enderror 

              </div>
              <div class="form-group col-md-6 mt-2">
                <label for="inputEmail4">Apellido Paterno</label>
                <input type="text" class="form-control" id="inputEmail4" name="paterno" value="{{old('paterno')}}">

                  @error('paterno')
                  <small class="text-danger">{{$message}}</small>
                  @enderror 

              </div>
              <div class="form-group col-md-6 mt-2">
                <label for="inputEmail4">Apellido Materno</label>
                <input type="text" class="form-control" id="inputEmail4" name="materno" value="{{old('materno')}}">

                  @error('materno')
                  <small class="text-danger">{{$message}}</small>
                  @enderror 

              </div>
              <div class="form-group col-md-6 mt-2">
                <label for="inputEmail4">Link Drive</label>
                <input type="text" class="form-control" id="inputEmail4" name="link" value="{{old('link')}}">
                @error('link')
                <small class="text-danger">{{$message}}</small>
                @enderror 
              </div>
            </div>

            <button type="submit" class="btn btn-primary mt-3">Enviar Formulario</button>
          </form>
    </div>
@endsection