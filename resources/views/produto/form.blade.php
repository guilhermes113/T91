@extends('layouts.base')
@section('conteudo')
    <h1>
        @if($produto)
            Atualizar Produto 
        @else
            Novo Produto
        @endif
    </h1>
    @if ($produto)
        <form action="{{ route('produto.update', ['id'=>$produto->id_produto]) }}" method="post">
    @else
        <form action="{{ route('produto.store') }}" method="post">
    @endif
        @csrf
       <div class="row">
            <div class="form-group col-md-6">
                <label for="produto" class="form-label">Produto*</label>
                <input type="text" name="produto" id="produto"
                    value="{{ $produto ? $produto->produto : old('produto') }}" required
                class="form-control">
            </div>

            <div class="form-group col-md-4">
                <label for="id_cliente" class="form-label">Cliente*</label>
                <select name="id_cliente" id="id_cliente" class="form-control" required>
                        <option value="">Selecione</option>
                        @foreach ($clientes as $cliente)
                            <option value="{{$cliente->id_cliente}}"

                                {{$produto && $produto->id_cliente == $cliente->id_cliente ? 'selected' : ''}}
                                >
                                   {{$cliente->cliente}}
                            </option>
                        @endforeach
                </select>
            </div>
            <div class="form-group col-md-2">
                <label for="btn-enviar" class="form-label">&nbsp;</label>
                <input type="submit" value="{{$produto ? 'Atualizar' : 'Cadastrar' }}"
                 id="btn-enviar"  class="btn btn-primary form-control">
            </div>
       </div>
    </form>
@endsection
