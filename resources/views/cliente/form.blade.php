@extends('layouts.base')
@section('conteudo')
    <h1>
        @if($cliente)
            Atualizar Cliente
        @else
            Novo Cliente
        @endif
    </h1>
    @if ($cliente)        
        <form action="{{ route('cliente.update', ['id'=>$cliente->id_cliente]) }}" method="post">        
    @else
        <form action="{{ route('cliente.store') }}" method="post">        
    @endif
        @csrf
       <div class="row">
            <div class="form-group col-md-6">
                <label for="cliente" class="form-label">cliente*</label>
                <input type="text" name="cliente" id="cliente"
                    value="{{ $cliente ? $cliente->cliente : old('cliente') }}" required
                class="form-control">
            </div>
            <div class="form-group col-md-2">
                <label for="btn-enviar" class="form-label">&nbsp;</label>
                <input type="submit" value="{{ $cliente ? 'Atualizar' : 'Cadastrar' }}" 
                 id="btn-enviar"  class="btn btn-primary form-control">
            </div>
       </div>
    </form>
@endsection