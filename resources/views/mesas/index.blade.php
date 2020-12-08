@extends('plantilla')
@section('content')
<body>
	<h1>Lista de Mesas</h1>
<a class="btn btn-success" href="{{ route('mesas.create')}}">Agregar Mesas</a>
	<table  width="100%" cellspacing="0" border="1">
            <thead>
				<tr>
					<td>Id</td>
					<td>Nombre</td>
					<td>Opciones</td>
				</tr>
			</thead>
            <tbody>
            	@foreach($mesas as $mesa)
	           <tr>
	           	<td>{{$loop->iteration}}</td>
	           	<td>{{$mesa->name}}</td>
	           	<td>
	           		<form method="POST" action="{{route('mesas.destroy', ['mesa'=>$mesa->id])}}">
	           			@csrf
	           			{{method_field('DELETE')}}
	           			<input type="submit" value="Eliminar">

	           		</form>
	           	
	           		<form  action="{{route('mesas.edit', ['mesa'=>$mesa->id])}}">
	           			
	           		
	           			<input type="submit" value="Editar">

	           		</form>

	           	</td>

	           </tr>
	           @endforeach
	      </tbody>
		
	</table>
	
</body>
@endsection