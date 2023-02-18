@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <a href="{{ route('libro.index') }}" class="btn btn-sm btn-primary mb-2">Back</a>
                <div class="card">
                    <div class="card-header">{{ __('Book') }}</div>
                    <div class="card-body">
                        <form action="{{ route('libro.store') }}" method="post">
                            @csrf
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group input-group-sm">
                                        <label>{{ __('Titulo') }}</label>
                                        <input name="titulo" type="text" class="form-control"
                                            value="{{ old('titulo') }}">
                                        @error('titulo')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group input-group-sm">
                                        <label>{{ __('Editorial') }}</label>
                                        <input name="editorial" type="text" class="form-control">
                                        @error('editorial')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group input-group-sm">
                                        <label>{{ __('ISBN') }}</label>
                                        <input name="isbn" type="text" class="form-control">
                                        @error('isbn')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group input-group-sm">
                                        <label>{{ __('Año de publicación') }}</label>
                                        <input name="anio" type="date" class="form-control">
                                        @error('anio')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group input-group-sm">
                                        <label>{{ __('Paginas') }}</label>
                                        <input name="paginas" type="text" class="form-control">
                                        @error('paginas')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group input-group-sm">
                                        <label>{{ __('Idioma') }}</label>
                                        <input name="idioma" type="text" class="form-control">
                                        @error('idioma')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group input-group-sm">
                                        <label>{{ __('Resumen') }}</label>
                                        <textarea name="resumen" id="" rows="5" class="form-control"></textarea>
                                        @error('resumen')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group input-gruop-sm">
                                        <label>Autor</label>
                                        <select class="js-example-basic-multiple form-control" name="autors[]" multiple="multiple">
                                            @foreach ($autor as $aut)
                                                <option value="{{ $aut->id }}">{{ $aut->nombres }} {{ $aut->apellidos }}</option>
                                            @endforeach
                                          </select>
                                          @error('autors')
                                          <small class="text-danger">{{ $message }}</small>
                                          @enderror
                                    </div>
                                </div>
                                {{-- <div class="col-md-6">
                                <div class="form-group input-group-sm">
                                    <label>{{ __('Portada') }}</label>
                                    <input type="file" class="form-control">
                                </div>
                            </div> --}}
                            </div>
                            <button type="submit" class="btn btn-sm btn-primary mt-2">Store</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('js')
<script>
    $(document).ready(function() {
    $('.js-example-basic-multiple').select2();
});
</script>
@endsection
