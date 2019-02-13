<?php

namespace App\Http\Controllers;

use App\Fabricante;
use Illuminate\Http\Request;
use Freshbitsweb\Laratables\Laratables;

class FabricanteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $fabricantes = Fabricante::all();
        
        return view('fabricantes.index', compact('fabricantes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('fabricantes.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'nome' => 'required'
        ]);

        Fabricante::create($request->all());

        return redirect()->route('fabricantes.index')->with('success','Fabricante criado com sucesso.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $fabricante = Fabricante::find($id);

        return view('fabricantes.show', compact('fabricante'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $fabricante = Fabricante::find($id);

        return view('fabricantes.edit', compact('fabricante'));
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
        $request->validate([
            'nome' => 'required'
        ]);

        $fabricante = Fabricante::find($id);
        $fabricante->nome = $request->get('nome');
        $fabricante->save();

        return redirect('/fabricantes')->with('success', 'Fabricante Alterada com sucesso.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $fabricante = Fabricante::find($id);
        $fabricante->delete();
        
        return redirect('/fabricantes')->with('success', 'Fabricante excluído com sucesso.');
    }

    /**
     * Retorna os fabricantes em formato json
     *
     * @return json
     */
    public function getFabricanteDatatablesData () 
    {
        return Laratables::recordsOf(Fabricante::class);
    }
}
