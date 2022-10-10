@extends('layouts.plantilla')

@section('title','Home')
    
@section('content')


@section('script')
<div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
    <div class="carousel-inner">
      <div class="carousel-item active">
        <img src="https://super-ficcion.com/wp-content/uploads/2022/03/bruja-escarlata.webp" class="d-block w-100" alt="...">
      </div>
      <div class="carousel-item">
        <img src="https://i.pinimg.com/736x/b4/9d/45/b49d45383261c34256b8781b7c6918fb.jpg" class="d-block w-100" alt="...">
      </div>
      <div class="carousel-item">
        <img src="https://super-ficcion.com/wp-content/uploads/2022/03/bruja-escarlata.webp" class="d-block w-100" alt="...">
      </div>
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Next</span>
    </button>
  </div>
    
@endsection
@endsection
