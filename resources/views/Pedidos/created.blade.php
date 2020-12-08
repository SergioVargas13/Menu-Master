<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Crear Pedido</title>
</head>
<body>

	<form method="POST" action="{{route('pedidos.store')}}">
		@csrf
		Estado:<input type="tinyint" name="estado"/><br>
		Subtotal:<input type="number" name="subtotal"/><br>
		Cantidad:<input type="number" name="cantidad"/><br>
		Fecha:<input type="date" name="fecha"/><br>
		Comentarios:<input type="text" name="comentarios"/><br>
	
		<input type="submit" name="Agregar">

	</form>

	
</body>
</html>