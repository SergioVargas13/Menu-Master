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
    <h1>Lista de Visitantes</h1>
    <table class="table table-hover" >
    <thead>
        <tr>
            <td>Id</td>
            <td>Documento</td>
            <td>Nombre</td>
            <td>Telefono</td>
            <td>Dependencia</td>
            <td>Fecha Visita</td>
            <td>Option</td>
        </tr>
    </thead>
    <tbody>
        @foreach($visita as $v)
        <tr>
            <td>{{$v->id}}</td>
            <td>{{$v->documento}}</td>
            <td>{{$v->nombre}}</td>
            <td>{{$v->telefono}}</td>
            <td>{{$v->dependencia}}</td>
            <td>{{$v->fecha_visita}}</td>
            <td>
            @if (Auth::user()->tieneRole('Admin'))
            <form method="POST" action="{{ route('visita.destroy',['visitum'=>$v->id]) }}">
                @csrf
                {{ method_field('DELETE') }}
                <input type="submit" value="Eliminar" class="btn btn-danger">
            </form>
            <form action="{{ route('visita.edit',['visitum'=>$v->id]) }}">
              <input type="submit" value="Editar" class="btn btn-warning"> 
            </form>
            @endif
            </td>
        </tr>
        @endforeach
    </tbody>
    </table>
    <a href="{{ route('home') }}"><button type="button" class="btn btn-primary">Volver</button></a>
    @if (Auth::user()->tieneRole('Admin'))
    <a href="{{ route('visita.create') }}"><button type="button" class="btn btn-success">Add Visitante</button></a><br>
    @endif
    </div>
</body>
</html>
@endsection