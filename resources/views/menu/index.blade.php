@extends('plantilla')
@section('content')

    <div class="container" align="center"  style="
width:60%">
    <h1>Lista de Menus</h1>
    <a href="{{ route('home') }}"><button type="button" class="btn btn-primary">Home</button></a>
<a class="btn btn-success" href="{{ route('menu.create')}}">Agregar Menu</a>
    <table  class="table table-hover">
            <thead>
                <tr>
                    <td>Id</td>
                    <td>Nombre del Menu</td>
                    <td>Opciones</td>
                </tr>
            </thead>
            <tbody>
                @foreach($menus as $m)
               <tr>
                <td>{{$m->id}}</td>
                <td>{{$m->nombre}}</td>
                <td>
                     <form  action="{{route('menu.edit', ['menu'=>$m->id])}}">
                        <input type="submit" value="Editar" class="btn btn-primary">
                    </form>
                <form method="POST" action="{{route('menu.destroy', ['menu'=>$m->id])}}">
                          {{ csrf_field() }}
                <input type="hidden" name="_method" value="DELETE">
                <button class=" btn btn-danger" >Eliminar</button>
                </form>
                <a method="get" href="{{ route('menu.showProducto',['menu_id'=>$m->id]) }}" class=" fa fa-eye btn btn-warning">Ver Productos</a>

                </td>
               </tr>
               @endforeach
          </tbody>      
    </table>
    </div>
@endsection