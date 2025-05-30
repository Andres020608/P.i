@extends('layouts.plantilla')

@section('titulomain')
Categorias
@endsection

@section('contenido')

<section class="container-tabla">
    <h2 class="titulo-tabla"> Categorias</h2>

    <nav class="nav-botones">
        <ul class="nav-menu">
        @can ('categoria.create')
            <li class="nav-item">
                <a href="{{ route('categoria.create') }}" class="nav-link btn-agregar">Agregar Categoria</a>
            </li>
        @endcan    
        </ul>
    </nav>
    
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Descripcion</th>
                <th>Status</th>               
                <th>Opciones</th>
            </tr>
        </thead>
        <tbody class="tabla-categorias">
        @foreach ($categorias as $categoria)
        <tr>
            <td>{{ $categoria->id }}</td>
            <td>{{ $categoria->nombre }}</td>
            <td>{{ $categoria->descripcion }}</td>
            <td>{{ $categoria->status }}</td>
            <td>
                <a href="{{ route('categoria.show', $categoria->id) }}">
                   <img src="{{ asset('img/ojo.png') }}" alt=""> 
                </a>

                @can ('categoria.update')
                   <a href="{{ route('categoria.edit', $categoria->id) }}">
                       <img src="{{ asset('img/lapiz.png') }}" alt="">
                   </a>
                @endcan  

                @can ('categoria.destroy')
                    <form action="{{ route('categoria.destroy', $categoria->id) }}" method="POST" onsubmit="return confimarEliminacion()">
                        @csrf
                        @method('DELETE')
                        <input type="image" src="{{ asset('img/basura.png') }}">
                    </form>
                @endcan  
                <script>
                    function confimarEliminacion() {
                        return confirm('¿Seguro deseas eliminar?');
                    }
                </script>
            </td>
        </tr>
        @endforeach
        </tbody>
    </table>
</section>    

@endsection
