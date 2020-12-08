<?php

namespace App\Http\Controllers;

use App\Factura;
use App\mesa;
use App\User;
use Illuminate\Http\Request;

class FacturaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cliente = mesa::all();
        $user = User::all();
        $factura = Factura::all();
        return view('factura.index',['factura' =>$factura, 'cliente'=>$cliente, 'user'=>$user]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
    
        $cliente = mesa::all();
        $user = User::all();
        $factura = Factura::orderBy('id', 'desc')->first();
        $id_fact=0;
        if ($factura) {
            $id_fact = $factura->id;
        }      
        
        if ($id_fact+1<10) {
            $num = "0".($id_fact+1);
        } else {
            $num = "".($id_fact+1);
        }

        return view('factura.add',['cliente'=>$cliente], ['user'=>$user, 'num'=>$num]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $factura = new Factura();
        $factura->codigo=$request->codigo;
        $factura->cliente_id=$request->cliente_id;
        $factura->vendedor_id=$request->vendedor_id;
        $factura->fecha=$request->fecha; 
        $factura->total=$request->total=0; 
        $factura->save();
        return redirect()->route('factura.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $cliente = mesa::all();
        $user = User::all();
        $factura = Factura::find($id);
        return view('factura.ver',['factura'=>$factura, 'cliente'=>$cliente, 'user'=>$user]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $factura = Factura::find($id);
        $cliente = mesa::all();
        $user = User::all();
        return view('factura.edit',['factura'=>$factura, 'cliente'=>$cliente, 'user'=>$user]);
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
        $factura = Factura::find($id);
         $factura->codigo=$request->codigo;
        $factura->cliente_id=$request->cliente_id;
        $factura->vendedor_id=$request->vendedor_id;
        $factura->fecha=$request->fecha;  
        $factura->save();
        return redirect()->route('factura.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $factura = Factura::find($id);
        $factura->delete();
        return redirect()->route('factura.index');
    }
}
