@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="mb-2">
                <a href="{{ route('autor.index')}}" class="btn btn-sm btn-primary">Back</a>
            </div>
            <div class="card">
                <div class="card-header">{{ __('Autor') }}</div>
                <div class="card-body">
                    <form action="{{ route('autor.update', $autor) }}" method="post">
                        @csrf
                        @method('put')
                        <div class="row">
                            <div class="col-md-6">
                                <label>Nombres</label>
                                <input type="text" class="form-control" name="nombres" value="{{ $autor->nombres }}">
                                @error('nombres')
                                <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>

                            <div class="col-md-6">
                                <label>Apellidos</label>
                                <input type="text" class="form-control" name="apellidos" value="{{ $autor->apellidos }}">
                                @error('apellidos')
                                <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>

                            <div class="col-md-12">
                                <label>Bibliografia</label>
                                <textarea name="bibliografia" class="form-control" cols="30" rows="5">{{ $autor->bibliografia }}</textarea>
                                @error('bibliografia')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>
                        <button type="submit" class="btn btn-sm btn-primary mt-2">Update</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection