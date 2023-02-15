@extends('layouts.app')
@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-8">
              <a href="{{ route('docente.store') }}" class="btn btn-info btn-sm mb-2">Back Teacher</a>
                <div class="card">
                    <div class="card-header">{{ __('Dashboard') }}</div>
                    <div class="card-body">
                        <form action="{{ route('docente.store') }}" method="post">
                            @csrf
                            <div class="row">
                                <div class="form-group col-md-6 mt-2 input-group-sm">
                                    <label for="inputEmail4">Nombre</label>
                                    <input type="text" class="form-control" id="inputEmail4" name="nombre"
                                        value="{{ old('nombre') }}">
                                    @error('nombre')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror

                                </div>
                                <div class="form-group col-md-6 mt-2 input-group-sm">
                                    <label for="inputEmail4">Apellido Paterno</label>
                                    <input type="text" class="form-control" id="inputEmail4" name="paterno"
                                        value="{{ old('paterno') }}">

                                    @error('paterno')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror

                                </div>
                                <div class="form-group col-md-6 mt-2 input-group-sm">
                                    <label for="inputEmail4">Apellido Materno</label>
                                    <input type="text" class="form-control" id="inputEmail4" name="materno"
                                        value="{{ old('materno') }}">

                                    @error('materno')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror

                                </div>
                                <div class="form-group col-md-6 mt-2 input-group-sm">
                                    <label for="inputEmail4">Link Drive</label>
                                    <input type="text" class="form-control" id="inputEmail4" name="link"
                                        value="{{ old('link') }}">
                                    @error('link')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>

                            <button type="submit" class="btn btn-primary btn-sm mt-2">Store</button>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
