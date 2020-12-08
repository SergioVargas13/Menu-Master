<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Crear mesa</title>
</head>
<body>

	<form method="POST" action="{{route('mesas.store')}}">
		@csrf
		Nombre:<input type="text" name="name"/><br>

		<input type="submit" name="Agregar">

	</form>

	
</body>
</html>