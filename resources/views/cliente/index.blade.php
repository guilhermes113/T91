@extends('layouts.base')

@section('conteudo')

    <h1> 
        Clientes 
        - 
        <a href="{{ route('cliente.create') }}" class="btn btn-dark">
            Novo
        </a>
    </h1>

    <table class="table table-striped table-border">
        <thead>
            <tr>
                <th>Ações</th>
                <th>ID</th>
                <th>cliente</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($cliente->get() as $cliente)                
            <tr>
                <td>
                    <a href="{{ route('cliente.edit', ['id'=>$cliente->id_cliente]) }}" class="btn btn-success">
                        Editar
                    </a>
                </td>
                <td>{{ $cliente->id_cliente }}</td>
                <td>{{ $cliente->cliente }}</td>
                <td></td>
            </tr>
            @endforeach
        </tbody>
    </table>

    
@endsection