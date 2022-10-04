<?php

namespace App\Http\Controllers;

use App\Models\cliente;
use Illuminate\Http\Request;

class ClienteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cliente = Cliente::orderBy('cliente');
        return view('cliente.index')
                ->with(compact('cliente'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $cliente = null;
        return view('cliente.form') 
                ->with(compact('cliente'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $cliente = new Cliente();
        $cliente->fill($request->all());
        $cliente->save();

        return redirect()->route('cliente.index')->with('success',' Cadastrado com sucesso!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\cliente  $cliente
     * @return \Illuminate\Http\Response
     */
    public function show(int $id)
    {
        $cliente = Cliente::find($id);
        return view('cliente.show')
                ->with(compact('cliente'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\cliente  $cliente
     * @return \Illuminate\Http\Response
     */
    public function edit(int $id)
    {
        $cliente = Cliente::find($id);
        return view('cliente.form')
                ->with(compact('cliente'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\cliente  $cliente
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, int $id)
    {
        $cliente = Cliente::find($id);
        $cliente->fill($request->all());
        $cliente->save();

        return redirect()
                ->route('cliente.index')
                ->with('success',' Atualizado com sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\cliente  $cliente
     * @return \Illuminate\Http\Response
     */
    public function destroy(int $id)
    {
        $cliente = Cliente::find($id);        
        $cliente->delete();

        return redirect()
                ->route('cliente.index')
                ->with('danger',' Excluído com sucesso!');
    }
}
