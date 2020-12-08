@extends('plantilla')
@section('content')
    <div class="container" align="center"  style="
width:60%">
    <h1>Lista de Factura</h1>
    <a href="{{ route('home') }}"><img src="senasoft/img/home.png" 
width="48"></a>
    <a href="{{ route('factura.create')}}"><img src="senasoft/img/agregar.png" 
width="50"></a>
    <table class="table table-hover">
            <thead class="bg-info">
                <tr>
                    <td>Id</td>
                    <td>Numero Factura</td>
                    <td>Cliente</td>
                    <td>Vendedor</td>
                    <td>Fecha Factura</td>
                    <td>Total</td>
                    <td>Opciones</td>
                </tr>
            </thead>
            <tbody>
                @foreach($factura as $f)
               <tr>
                <td>{{$f->id}}</td>
                <td>{{$f->codigo}}</td>
                @foreach ($cliente as $c)
                @if($c->id == $f->cliente_id)
                <td>{{ $c->nombre }} {{ $f->nombre }}</td>

                @endif
            @endforeach
                @foreach ($user as $u)
                @if($u->id == $f->vendedor_id)
                <td>{{ $u->name }}</td>
                @endif
              @endforeach
                <td>{{$f->fecha}}</td>
                <td>{{$f->total}}</td>
                <td>
                   <form method="POST" action="{{route('factura.destroy', ['factura'=>$f->id])}}">
                        @csrf
                        {{method_field('DELETE')}}
                        <input type="submit" value="Eliminar" class="btn btn-danger">

                    </form>

                   <form  action="{{route('factura.edit', ['factura'=>$f->id])}}">
                        
                    <input type="submit" value="Editar" class="btn btn-warning">

                    </form>
                    <form  action="{{route('factura.show', ['factura'=>$f->id])}}">
                        
                    <input type="submit" value="Ver Factura" class="btn btn-success">

                    </form>
                </td>

               </tr>
               @endforeach
          </tbody>
        
    </table>
    </div>
 @endsection