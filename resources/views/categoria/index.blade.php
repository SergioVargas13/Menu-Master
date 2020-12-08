@extends('plantilla')
@section('content')

    <div class="container" align="center"  style="
width:60%">
    <h1>Lista de Categorias</h1>
    <a href="{{ route('home') }}"><button type="button" class="btn btn-primary">Home</button></a>
<a class="btn btn-success" href="{{ route('categoria.create')}}">Agregar Categoria</a>
    <table  class="table table-hover">
            <thead>
                <tr>
                    <td>Id</td>
                    <td>Nombre de la Categoria</td>
                    <td>Opciones</td>
                </tr>
            </thead>
            <tbody>
                @foreach($categorias as $categoria)
               <tr>
                <td>{{$categoria->id}}</td>
                <td>{{$categoria->nombre}}</td>
                <td>
                     <form  action="{{route('categoria.edit', ['categorium'=>$categoria->id])}}">
                        <input type="submit" value="Editar" class="btn btn-primary">
                    </form>
                    <form method="POST" action="{{route('categoria.destroy', ['categorium'=>$categoria->id])}}">
                          {{ csrf_field() }}
                <input type="hidden" name="_method" value="DELETE">
                <button class=" btn btn-danger" >Eliminar</button>
                </form>
                </td>
               </tr>
               @endforeach
          </tbody>      
    </table>
    </div>
@endsection