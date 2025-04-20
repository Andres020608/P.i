@extends('layouts.plantilla')
@section('titulomain')
<p>Productos</p>
@endsection
@section('contenido')

<section class="container-tabla">
    <h2 class="titulo-tabla"> Listado de Joyas</h2>
    
  <nav class="nav-botones">
    <form action="{{ route('producto.index') }}" method="GET" class="form-filtros">
        <select name="categoria" class="filtro-select">
            <option value=""> Categoría </option>
            @foreach($categorias as $categoria)
                <option value="{{ $categoria->id }}" {{ request('categoria') == $categoria->id ? 'selected' : '' }}>
                    {{ $categoria->nombre }}
                </option>
            @endforeach
        </select>    
        <select name="stock" class="filtro-select">
            <option value=""> Stock </option>
            <option value="con" {{ request('stock') == 'con' ? 'selected' : '' }}>Con stock</option>
            <option value="sin" {{ request('stock') == 'sin' ? 'selected' : '' }}>Sin stock</option>
        </select>
    
        <input type="text" name="buscar" placeholder="Buscar Joya..." value="{{ request('buscar') }}" class="filtro-input">
    
        <button type="submit" class="nav-link btn-filtrar">Filtrar</button>
    </form>

    <ul class="nav-menu">
        <li class="nav-item">
            <a href="{{ route('producto.create') }}" class="nav-link btn-agregar">Agregar Joyas</a>
        </li>
        <li class="nav-item">
            <a href="{{ route('pdf.productos', request()->query()) }}" target="_blank" class="nav-link btn-generar-pdf">Descargar pdf</a>
        </li>
    </ul>
  </nav>
   
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Imagen</th>
                <th>Categoría</th>
                <th>Precio</th>
                <th>Precio de venta</th>
                <th>Stock</th>
                <th>Opciones</th>
            </tr>
        </thead>
        <tbody class="tabla-productos">
          @foreach ($productos as $producto)
          <tr>                
              <td>{{ $producto->id }}</td>
              <td>{{ $producto->nombre }}</td>
              <td>
                <img src="{{ asset('img/'.$producto->imagen) }}" alt="{{ $producto->imagen }}">
              </td>
              <td> 
                @if ($producto->categoria)
                    {{ $producto->categoria->nombre }}
                @else
                    Sin categoría
                @endif
              </td>
              <td>{{ $producto->precio }}</td>
              <td>{{ $producto->precio_venta }}</td>
              <td>{{ $producto->stock }}</td>
              <td>
               <a href="{{ route('producto.show', $producto->id) }}">
                  <img src="{{ asset('img/ojo.png') }}" alt="">
               </a>
               <a href="{{ route('producto.edit', $producto->id) }}">
                  <img src="{{ asset('img/lapiz.png') }}" alt="">
               </a>
               <form action="{{ route('producto.destroy', $producto->id) }}" method="POST" onsubmit="return confimarEliminacion()">
                  @csrf
                  @method('DELETE')
                  <input type="image" src="{{ asset('img/basura.png') }}">
               </form>
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

    <div class="nav-botones">
        {{ $productos->links('vendor.pagination.default') }} 
    </div>
</section>

@endsection
