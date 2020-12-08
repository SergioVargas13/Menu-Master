<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Editar Pedido</title>
</head>
<body>
	<form method="POST" action="{{route('pedidos.update', ['pedido'=>$pedido->id])}}">
		@csrf
		{{method_field('PUT')}}
		Estado:<input type="tinyint" name="estado" value="{{$pedido->estado}}" /><br>
		Subtotal:<input type="boolean" name="subtotal" value="{{$pedido->subtotal}}" /><br>
		Cantidad:<input type="number" name="cantidad" value="{{$pedido->cantidad}}" /><br>
		Fecha:<input type="date" name="fecha" value="{{$pedido->fecha}}" /><br>
		Comentarios:<input type="text" name="comentarios" value="{{$pedido->comentarios}}" /><br>

		<input type="submit" name="Enviar">

	</form>

	
</body>
</html>