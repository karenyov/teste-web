<?php

namespace App\Http\Controllers;

use App\Performance;
use App\Produto;
use Illuminate\Http\Request;

class PerformanceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('performances.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $produtos = Produto::all();

        return view('performances.create', ['produtos' => $produtos]);
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
            'preco_concorrencia' => 'required',
            'produto_id' => 'required'
        ]);

        $request['preco_concorrencia'] = str_replace(",", ".", str_replace(".", "", $request->get('preco_concorrencia')));

        Performance::create($request->all());

        return redirect()->route('performances.index')->with('success','Performance criado com sucesso.');
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

    public function export_pdf()
    {
        $data = Performance::get();
        $pdf = PDF::loadView('pdf.performances', $data);
        $pdf->save(storage_path().'_filename.pdf');

        return $pdf->download('performances.pdf');
    }
}
