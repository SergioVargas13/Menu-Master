<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Visitante;

class visitascontroller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $visitas=Visitante::all(); 
        return view('visita.index',['visita'=>$visitas]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
         return view('visita.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $visitas = new Visitante();
        $visitas->documento=$request->documento;
        $visitas->nombre=$request->nombre;
        $visitas->telefono=$request->telefono;
        $visitas->dependencia=$request->dependencia; 
        $visitas->fecha_visita=$request->fecha_visita;
        $visitas->save();
        return redirect()->action('visitascontroller@index');
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
        $visita = Visitante::find($id);
        return view('visita.edit',['visita'=>$visita]);
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
        $visita = Visitante::find($id);
        $visita->documento=$request->documento;
        $visita->nombre=$request->nombre;
        $visita->telefono=$request->telefono;
        $visita->dependencia=$request->dependencia; 
        $visita->fecha_visita=$request->fecha_visita;
        $visita->save();
        return redirect()->action('visitascontroller@index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $visitas = Visitante::find($id);
        $visitas->delete();
        return redirect()->action('visitascontroller@index');
    }
}
