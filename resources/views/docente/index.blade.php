<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">

</head>
<body>
  
  <div class="container">
    <div class="row">
      <div class="card">

        <div class="card-header">
          Product Info
        </div>

        <div class="card-body">

            <div class="form-group">
              <input type="text" name="search" id="search" class="form-controller" onkeyup="fetchData()">
            </div>

            <table class="table table-bordered table-hover">
              <thead>
                <tr>
                  <th>ID</th>
                  <th>Title</th>
                  <th>Content</th>
                </tr>
              </thead>
              <tbody id="tbodyfordata">
                <!-- Data will be appened here -->
              </tbody>
            </table>
        </div>
      </div>
    </div>
  </div>                             
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
        <th scope="col">Imprimir</th>
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
        <td><form action="{{ route('docente.destroy', $item->id) }}" class="eliminar" method="post">@method('delete')  @csrf  
          <button type="submit" class="btn btn-danger">Eliminar</button>
        </form></td>
        <td><a href="{{route('imprimir', $item)}}" class="btn btn-dark" target="_blank">Imprimir</a></td>
      </tr>
    </tbody>
    @endforeach
  </table>
</div>

<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>


function fetchData()
	{
		//Search Value
		const val = document.getElementById('search').value;

		//Search Url
		const url = "{{ route('search') }}" + "?search=" + val;

		console.log(url);
		fetch(url)
		.then((resp) => resp.json()) //Transform the data into json
		.then(function(data){
			console.log(data);

			var tbodyref  = document.getElementById('tbodyfordata');
			console.log(tbodyref);
			tbodyref.innerHTML = '';

			let categories = data;
			console.log(categories);
			categories.map(function(category){
				let tr = createNode('tr'),
					id = createNode('td'),
					a_nombre = createNode('td'),
					a_paterno = createNode('td');
					id.innerText = category.id;
					a_nombre.innerText = category.a_nombre;
					a_paterno.innerText = category.a_paterno;
					append(tr,id);
					append(tr,a_nombre);
					append(tr,a_paterno);
					append(tbodyref,tr);
				});			
		})
		.catch(function(error){
			console.log(error);
		})
	}

	function createNode(element)
	{
		return document.createElement(element);
	}

	function append(parent,el)
	{
		return parent.appendChild(el);
	}
</script>
</body>
</html>
