@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.css" />
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap4.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.4.1/css/buttons.dataTables.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
@endsection
@section('content')
    <div class="container">
                <div class="mb-2">
                    <a href="{{ route('autor.create')}}" class="btn btn-sm btn-primary">Create</a>
                </div>
                <div class="card">
                    <div class="card-header">{{ __('Autors') }}</div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="autor" class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>Id</th>
                                        <th>Nombre</th>
                                        <th>Apellido</th>
                                        <th>Bibliografia</th>
                                        <th>Editar</th>
                                        <th>Eliminar</th>
                                    </tr>
                                </thead>
                                {{-- <tbody>
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
                                </tbody> --}}
                            </table>
                        </div>
                    </div>
                </div>
    </div>
@endsection

@section('js')
<script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.js"></script>
<script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap4.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.4.1/js/dataTables.buttons.min.js"></script>
@if (session('success'))    
<script>
    Lobibox.notify('success', {
        // width: 400,
        hight: 900,
        img: "{{ asset('imgs/success.png') }}",
        position: 'top right',
        title: "Registrado Autor",
        msg: '{{ session('success') }}'
    });
</script>
@endif

@if (session('delete'))    
<script>
    Lobibox.notify('info', {
        // width: 400,
        hight: 200,
        modal: true,
        img: "{{ asset('imgs/success.png') }}",
        position: 'top right',
        title: "Autor Eliminado",
        msg: '{{ session('delete') }}'
    });
</script>
@endif

<script>
$('#autor').DataTable({
    processing: true, // Habilitar el indicador de procesamiento
    responsive: true, // Habilitar la funcionalidad de diseño responsivo
    pagingType: "full_numbers", // Mostrar todos los controles de paginación
    ajax: {
        url: '{{ route('datatable.data') }}', // Cambiar aquí la URL que retorna los datos en formato JSON
        dataSrc: 'data' // Indicar la propiedad que contiene los datos en la respuesta JSON
    },
    columns:
    [
        {data: 'id'},
        {data: 'nombres'},
        {data: 'apellidos'},
        {data: 'bibliografia'},
        {
        data: 'id',
            render: function(data) {
            return '<a class="btn btn-primary" href="/autor/'+data+'/edit"><span><i class="fa fa-edit"></i></span>Editar</a>';
        }
        },
        {
        data: 'id',
            render: function(data) {
            return '<form action="/autor/'+data+'" method="post"> @csrf @method('delete')<button type="submit" class="btn btn-danger">Eliminar</button></form>';
        }
        }

    ],
    language: {
        url: "https://cdn.datatables.net/plug-ins/1.13.5/i18n/es-ES.json"
    }
});

</script>
@endsection
