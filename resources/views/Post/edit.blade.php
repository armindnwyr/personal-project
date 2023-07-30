@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <a href="{{ route('post.index') }}" class="btn btn-primary btn-sm mb-2">Back index</a>
            <div class="card">
                <div class="card-header">{{ __('Post Update') }}</div>
                <div class="card-body">
                    <form action="{{ route('post.update', $post->id) }}" method="post">
                        @csrf
                        @method('put')
                        <div class="row">
                            <div class="form-group col-md-6">
                                <label for="">Titulo</label>
                                <input name="titulo" type="text" class="form-control" value="{{ $post->titulo }}">
                                @error('titulo')
                                <small class="text-danger">{{$message}}</small>
                                @enderror 
                            </div>
                            <div class="form-group col-md-6">
                                <label for="">Url</label>
                                <input name="url" type="text" class="form-control" value="{{ $post->url }}">
                                @error('url')
                                <small class="text-danger">{{$message}}</small>
                                @enderror 
                            </div>

                            <div class="form-group">
                                <label>Descripción</label>
                                <textarea name="descripcion" id="descripcion" cols="10" rows="10" class="form-control">{{ $post->descripcion }}</textarea>
                                @error('descripcion')
                                <small class="text-danger">{{$message}}</small>
                                @enderror 
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary btn-sm mt-4">Update</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    $('#descripcion').summernote({
        placeholder: 'description...',
        tabsize: 2,
        height: 300,
    });
</script>
@endsection