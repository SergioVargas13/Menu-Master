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
    <h1>Lista de Cursos</h1>
    <table class="table table-hover" >
    <thead>
        <tr>
            <td>Id</td>
            <td>Nombre</td>
            <td>Istructor Lider</td>
            <td>Fecha Inicio</td>
            <td>Fecha Fin</td>
            <td>Option</td>
        </tr>
    </thead>
    <tbody>
        @foreach($curso as $c)
        <tr>
            <td>{{$c->id}}</td>
            <td>{{$c->nombre}}</td>
            <td>{{$c->instructor_lider}}</td>
            <td>{{$c->fecha_inicio}}</td>
            <td>{{$c->fecha_fin}}</td>
            <td>
            @if (Auth::user()->tieneRole('Admin'))
            <form method="POST" action="{{ route('curso.destroy',['curso'=>$c->id]) }}">
                @csrf
                {{ method_field('DELETE') }}
                <input type="submit" value="Eliminar" class="btn btn-danger">
            </form>
            <form action="{{ route('curso.edit',['curso'=>$c->id]) }}">
              <input type="submit" value="Editar" class="btn btn-warning"> 
            </form>
            <a href="{{ route('aprendiz.index') }}"><button type="button" class="btn btn-success">Add Aprendiz</button></a>
            @endif
            </td>
        </tr>
        @endforeach
    </tbody>
    </table>
    <a href="{{ route('home') }}"><button type="button" class="btn btn-primary">Volver</button></a>
    @if (Auth::user()->tieneRole('Admin'))
    <a href="{{ route('curso.create') }}"><button type="button" class="btn btn-success">Add Visitante</button></a><br>
    @endif
    </div>
</body>
</html>
@endsection