@extends('layouts.app')

@section('title', 'Relatório - Estoque Baixo')

@section('content')
<h1>Produtos com estoque abaixo de {{ $limit }} unidades</h1>

@if($products->isEmpty())
    <div class="alert alert-info">Nenhum produto com estoque abaixo de {{ $limit }} encontrado.</div>
@else
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nome</th>
                <th>Quantidade</th>
                <th>Categoria</th>
            </tr>
        </thead>
        <tbody>
            @foreach($products as $p)
                <tr>
                    <td>{{ $p->id }}</td>
                    <td>{{ $p->name }}</td>
                    <td>{{ $p->quantity }}</td>
                    <td>{{ $p->category }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endif

@endsection
