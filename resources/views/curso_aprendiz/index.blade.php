@extends('layouts.app')

@section('content')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <div class="container" align="center"  style="
width:60%">
    <h1>Lista de Aprendices</h1>
    <form method="POST" >
        @csrf
    <table class="table table-hover" >
    <thead>
        <tr>
            <td>Id</td>
            <td>Nombre</td>
            <td>Email</td>
            <td>Option</td>
        </tr>
    </thead>
    <tbody>
        @foreach($aprendiz as $a)
        <tr>
            <td>{{$a->id}}</td>
            <td>{{$a->name}}</td>
            <td>{{$a->email}}</td>
            <td>
            <form>
                <input type="checkbox" name="aprendiz_id[]" value="{{ $a->id }}">
            </form>
            </td>
        </tr>
        @endforeach
    </tbody>
    </table>
    <a href="{{ route('curso.index') }}"><button type="button" class="btn btn-primary">Volver</button></a>
     <input type="submit" name="Guardar" class="btn btn-success">
     </form>   
    </div>
</body>
</html>
@endsection