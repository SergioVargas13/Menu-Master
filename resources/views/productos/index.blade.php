@extends('plantilla')
@section('content')

	<div class="container" align="center"  style="
width:60%">
	<h1>Lista de Productos</h1>
	<a href="{{ route('home') }}"><button type="button" class="btn btn-primary">Home</button></a>
<a class="btn btn-success" href="{{ route('productos.create')}}">Agregar Productos</a>
	<table  class="table table-hover">
            <thead>
				<tr>
					<td>Id</td>
					<td>Nombre</td>
					<td>Precio</td>
					<td>Cantidad</td>
					<td>Categoria</td>
					<td>Opciones</td>
				</tr>
			</thead>
            <tbody>
            	@foreach($productos as $producto)
	           <tr>
	           	<td>{{$loop->iteration}}</td>
	           	<td>{{$producto->name}}</td>
	           	<td>{{$producto->precio}}</td>
	           	<td>{{$producto->cantidad}}</td>
				<td>{{$producto->categoria->nombre}}</td>
	           	<td>
	           		<form method="POST" action="{{route('productos.destroy', ['producto'=>$producto->id])}}">
	           			@csrf
	           			{{method_field('DELETE')}}
	           			<input type="submit" value="Eliminar" class="btn btn-danger">

	           		</form>
	           	
	           		<form  action="{{route('productos.edit', ['producto'=>$producto->id])}}">
	           			
	           		
	           			<input type="submit" value="Editar" class="btn btn-warning">

	           		</form>

	           	</td>

	           </tr>
	           @endforeach
	      </tbody>
		
	</table>
	</div>

@endsection