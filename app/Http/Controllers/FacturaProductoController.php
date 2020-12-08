<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\producto;
use App\Factura;

class FacturaProductoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $producto=producto::all(); 
        return view('factura_producto.index',['producto'=>$producto]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $factura = new Factura();
        $carro->save();
        return redirect()->route('productos.index');
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
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function addProducto($factura_id) {
        $factura = Factura::find($factura_id);
        $productos_id = $factura->productos->pluck('id')->toArray();
        $productos = producto::whereNotIn('id', $productos_id)->get();
        return view('factura_producto.index', 
        ['factura_id'=>$factura_id, 'productos'=>$productos]);
    }

    public function saveProductos(Request $request) {
        $factura_id=$request->factura_id;
        $factura = Factura::find($factura_id);
        //return var_dump($factura_id);
        if ($request->producto_id) {
            foreach($request->producto_id as $id) {
                $cantidad = $request['cantidad'.$id];
                $factura->productos()->attach($id, array('cantidad'=>$cantidad));

            }
        }
        return redirect()->route('factura.show');
    }

    public function deleteProducto($factura_id, $producto_id) {
        $factura = CarroCompra::find($factura_id);
        $factura->productos()->detach($producto_id);
        return redirect()->route('factura.show');
    }
}
