@extends('layouts.base')

@section('conteudo')

    <h1>
        <i class="bi bi-basket-fill"></i>
        Produto
        -
        <a href="{{ route('produto.create') }}" class="btn btn-dark">
            Novo
        </a>
    </h1>

    <table class="table table-striped table-border">
        <thead>
            <tr>
                <th>Ações</th>
                <th>ID</th>
                <th>Tipo</th>
                <th>Produto</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($produtos as $produto)
            <tr>
                <td>
                    <a href="{{ route('produto.edit', ['id'=>$produto->id_produto_custo]) }}" class="btn btn-success">
                        Editar
                    </a>
                </td>
                <td>{{ $produto->id_produto_custo }}</td>
                <td>{{ $produto->produto_custo }}</td>
                <td>{{ $produto->tipo->tipo }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>


@endsection
