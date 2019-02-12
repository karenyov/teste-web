<?php

namespace App\Http\Controllers;

use App\Produto;
use App\Marca;
use App\Fabricante;
use Illuminate\Http\Request;

class ProdutoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $produtos = Produto::all();
        
        return view('produtos.index', compact('produtos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $fabricantes = Fabricante::all();
        $marcas = Marca::all();

        return view('produtos.create', ['marcas' => $marcas, 'fabricantes' => $fabricantes]);
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
            'descricao' => 'required',
            'marca_id' => 'required',
            'fabricante_id' => 'required',
            'preco' => 'required'
        ]);

        $request['preco'] = str_replace(",", ".", str_replace(".", "", $request->get('preco')));

        Produto::create($request->all());

        return redirect()->route('produtos.index')->with('success','Produto criado com sucesso.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $produto = Produto::find($id);

        return view('produtos.show', compact('produto'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $produto = Produto::find($id);
        $fabricantes = Fabricante::all();
        $marcas = Marca::all();

        return view('produtos.edit',['produto' => $produto, 'marcas' => $marcas, 'fabricantes' => $fabricantes]);
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
            'descricao' => 'required',
            'marca_id' => 'required',
            'fabricante_id' => 'required'
        ]);

        $produto = Produto::find($id);
        $produto->descricao = $request->get('descricao');
        $produto->fabricante_id = $request->get('fabricante_id');
        $produto->marca_id = $request->get('marca_id');
        $produto->preco = str_replace(",", ".", str_replace(".", "", $request->get('preco')));
        $produto->save();

        return redirect('/produtos')->with('success', 'Produto Alterado com sucesso.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $produto = Produto::find($id);
        $produto->delete();
        
        return redirect('/produtos')->with('success', 'Produto excluído com sucesso.');
    }
}
