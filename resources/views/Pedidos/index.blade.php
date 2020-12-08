@extends('plantilla')
@section('content')

<body>
	<h1>Lista de Pedidos</h1>
<a class="btn btn-success" href="{{ route('pedidos.create')}}">Agregar Pedidos</a>
	<table  width="100%" cellspacing="0" border="1">
            <thead>
				<tr>
					<td>Id</td>
					<td>Estado</td>
					<td>Subtotal</td>
					<td>Cantidad</td>
					<td>Fecha</td>
					<td>Comentarios</td>
					<td>Opciones</td>
				</tr>
			</thead>
            <tbody>
            	@foreach($pedidos as $pedido)
	           <tr>
	           	<td>{{$loop->iteration}}</td>
	           	<td>{{$pedido->estado}}</td>
	           	<td>{{$pedido->subtotal}}</td>
	           	<td>{{$pedido->cantidad}}</td>
	           	<td>{{$pedido->fecha}}</td>	
	           	<td>{{$pedido->comentarios}}</td>           	
	           	<td>
	           		<form method="POST" action="{{route('pedidos.destroy', ['pedido'=>$pedido->id])}}">
	           			@csrf
	           			{{method_field('DELETE')}}
	           			<input type="submit" value="Eliminar">

	           		</form>
	           	
	           		<form  action="{{route('pedidos.edit', ['pedido'=>$pedido->id])}}">
	           			
	           		
	           			<input type="submit" value="Editar">

	           		</form>

	           	</td>

	           </tr>
	           @endforeach
	      </tbody>
		
	</table>
	
</body>
@endsection