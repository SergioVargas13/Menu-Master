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
        $productos = producto::all();
        $pedidos = pedido::all();
        return view('pedidos.created',['productos'=>$productos]);
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
        $pedido =new pedido();
        $pedido->estado=$request->estado;
        $pedido->subtotal=$request->subtotal=0;
        $pedido->cantidad=$request->cantidad;
        $pedido->fecha=$request->fecha;
        $pedido->comentario=$request->comentario;
        $pedido->producto_id=$request->producto_id;
        $pedido->save();
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
        $pedido=pedido::find($id);
        return view('pedidos.show', ['pedido'=>$pedido]);
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
        $productos = producto::all();
        $pedido = pedido::find($id);
        return view('pedidos.edit',['pedido' =>$pedido, 'productos'=>$productos]);
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
        $pedido = pedido::find($id);
        $pedido->estado=$request->estado;
        $pedido->subtotal=$request->subtotal;
        $pedido->cantidad=$request->cantidad;
        $pedido->fecha=$request->fecha;
        $pedido->comentario=$request->comentario;
        $pedido->producto_id=$request->producto_id;
        $pedido->save();
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
           $pedido= pedido::find($id);
           $pedido->delete();
              return redirect()->action('pedidoController@index');
    }
    public function deleteProducto($pedido_id,$producto_id) {
        $pedido = pedido::find($pedido_id);
        $pedido->productos()->detach($producto_id);
        return redirect()->route('pedidos.show',['pedido_id'=>$pedido_id]);
    }

    public function addProducto($pedido_id) {
        $pedido = pedido::find($pedido_id);
        $ids = $pedido->productos->pluck('id')->toArray();
        $producto = producto::whereNotIn('id', $ids)->get();
        return view('pedidos.lista_productos', 
        ['pedido_id'=>$pedido_id, 'productos'=>$producto]);
    }

    public function saveProducto(Request $request) {
        $pedido_id=$request->pedido_id;
        $pedido = pedido::find($pedido_id);
        if ($request->producto_id) {
            foreach($request->producto_id as $id) {
                $pedido->productos()->attach($id);

            }
        }
        return redirect()->route('pedidos.show',['pedido_id'=>$pedido_id]);
    }
}
