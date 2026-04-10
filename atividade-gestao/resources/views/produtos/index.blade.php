@extends('layouts.app')

@section('title', 'Produtos')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-3">
    <h1>Produtos</h1>
    <a href="{{ route('products.create') }}" class="btn btn-primary">Novo Produto</a>
</div>

<table class="table table-bordered">
    <thead>
        <tr>
            <th>#</th>
            <th>Nome</th>
            <th>Quantidade</th>
            <th>Preço</th>
            <th>Categoria</th>
            <th>Ações</th>
        </tr>
    </thead>
    <tbody>
        @forelse($products as $product)
        <tr>
            <td>{{ $product->id }}</td>
            <td><a href="{{ route('products.show', $product) }}">{{ $product->name }}</a></td>
            <td>{{ $product->quantity }}</td>
            <td>R$ {{ number_format($product->price, 2, ',', '.') }}</td>
            <td>{{ $product->category }}</td>
            <td>
                <a href="{{ route('products.edit', $product) }}" class="btn btn-sm btn-warning">Editar</a>

                <form action="{{ route('products.destroy', $product) }}" method="POST" style="display:inline-block" onsubmit="return confirm('Remover este produto?');">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-sm btn-danger">Remover</button>
                </form>
            </td>
        </tr>
        @empty
        <tr>
            <td colspan="6" class="text-center">Nenhum produto encontrado.</td>
        </tr>
        @endforelse
    </tbody>
</table>

{{ $products->links() }}

@endsection
