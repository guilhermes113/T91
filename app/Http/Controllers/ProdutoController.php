<?php

namespace App\Http\Controllers;


use App\Models\{Produto,Cliente};
use Illuminate\Http\Request;

class ProdutoController extends Controller
{
 
    public function index()
    {
        $produtos = Produto::orderBy('produto');
        return view('produto.index')
                ->with(compact('produtos'));
    }

    public function create()
    {
        $produto = null;
        $clientes = Cliente::orderby('cliente')->get();
        return view('produto.form')
                ->with(compact('produto','clientes'));
    }

    public function store(Request $request)
    {
        $produto = new Produto();
        $produto->fill($request->all());
        $produto->save();

        return redirect()
                ->route('produto.index')
                ->with('success',' Cadastrado com sucesso!');
    }

    public function show(int $id)
    {
        $produto = Produto::find($id);
        return view('produto.show')
                ->with(compact('produto'));
    }

    public function edit(int $id)
    {
        $produto = Produto::find($id);
        $clientes = Cliente::orderby('cliente')->get();
        return view('produto.form')
                ->with(compact('produto','clientes'));


    }

    public function update(Request $request, int $id)
    {
        $produto = Produto::find($id);
        $produto->fill($request->all());
        $produto->save();

        return redirect()
                ->route('produto.index')
                ->with('success',' Atualizado com sucesso!');
    }

    public function destroy(int $id)
    {
        $produto = Produto::find($id);
        $produto->delete();

        return redirect()
                ->route('produto.index')
                ->with('danger',' Excluído com sucesso!');
    }
}
