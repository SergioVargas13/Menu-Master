<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Editar Mesa</title>
</head>
<body>
	<form method="POST" action="{{route('mesas.update', ['mesa'=>$mesa->id])}}">
		@csrf
		{{method_field('PUT')}}
		Nombre:<input type="text" name="name" value="{{$mesa->name}}" /><br>
	
		<input type="submit" name="Enviar">

	</form>

	
</body>
</html>