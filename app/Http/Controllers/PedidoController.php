<?php

namespace App\Http\Controllers;

use App\pedido;
use Illuminate\Http\Request;
use App\producto;


class PedidoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $pedidos = pedido::all();
        return view('pedidos.index',['pedidos' =>$pedidos]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        //$productos = producto::all();
        $pedidos = pedido::all();
        return view('pedidos.created',['pedido'=>$pedidos]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $pedidos =new pedido();
        $pedidos->estado=$request->estado;
        $pedidos->subtotal=$request->subtotal=0;
        $pedidos->cantidad=$request->cantidad;
        $pedidos->fecha=$request->fecha;
        $pedidos->comentario=$request->comentario;
        //$pedidos->producto_id=$request->producto_id;
        /*echo var_dump($pedidos->comentario);
        return;*/
        $pedidos->save();
        return redirect()->action('PedidoController@index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\pedido  $pedido
     * @return \Illuminate\Http\Response
     */
    public function show(pedido $pedido)
    {
        //
        $pedidos=pedido::find($id);
        return view('pedidos.show', ['pedido'=>$pedidos]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\pedido  $pedido
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        //$productos = producto::all();
        $pedidos = pedido::find($id);
        return view('pedidos.edit',['pedido' =>$pedidos, 'productos'=>$productos]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\pedido  $pedido
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $pedidos = pedido::find($id);
        $pedidos->estado=$request->estado;
        $pedidos->subtotal=$request->subtotal;
        $pedidos->cantidad=$request->cantidad;
        $pedidos->fecha=$request->fecha;
        $pedidos->comentario=$request->comentario;
        //$pedidos->producto_id=$request->producto_id;
        $pedidos->save();
        return redirect()->action('pedidoController@index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\pedido  $pedido
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
           $pedidos= pedido::find($id);
           $pedidos->delete();
              return redirect()->action('pedidoController@index');
    }
    public function deleteProducto($pedido_id,$producto_id) {
        $pedidos = pedido::find($pedido_id);
        $pedidos->productos()->detach($producto_id);
        return redirect()->route('pedidos.show',['pedido_id'=>$pedido_id]);
    }

    public function addProducto($pedido_id) {
        $pedidos = pedido::find($pedido_id);
        $ids = $pedidos->productos->pluck('id')->toArray();
        $producto = producto::whereNotIn('id', $ids)->get();
        return view('pedidos.lista_productos', 
        ['pedido_id'=>$pedido_id, 'productos'=>$producto]);
    }

    public function saveProducto(Request $request) {
        $pedido_id=$request->pedido_id;
        $pedidos = pedido::find($pedido_id);
        if ($request->producto_id) {
            foreach($request->producto_id as $id) {
                $pedidos->productos()->attach($id);

            }
        }
        return redirect()->route('pedidos.show',['pedido_id'=>$pedido_id]);
    }
}
