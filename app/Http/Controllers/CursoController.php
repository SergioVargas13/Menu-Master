<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\curso;

class CursoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $curso=curso::all(); 
        return view('curso.index',['curso'=>$curso]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('curso.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $curso = new Curso();
        $curso->nombre=$request->nombre;
        $curso->instructor_lider=$request->instructor_lider;
        $curso->fecha_inicio=$request->fecha_inicio; 
        $curso->fecha_fin=$request->fecha_fin;
        $curso->save();
        return redirect()->action('CursoController@index');
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
        $curso = Curso::find($id);
        return view('curso.edit',['curso'=>$curso]);
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
        $curso = new Curso($id);
        $curso->nombre=$request->nombre;
        $curso->instructor_lider=$request->instructor_lider;
        $curso->fecha_inicio=$request->fecha_inicio; 
        $curso->fecha_fin=$request->fecha_fin;
        $curso->save();
        return redirect()->action('CursoController@index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        /*
        $curso = Curso::find($id);
        $curso->delete();
        return redirect()->action('CursoController@index');*/
    }
}
