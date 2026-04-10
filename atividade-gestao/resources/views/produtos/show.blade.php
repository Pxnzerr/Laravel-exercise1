@extends('layouts.app')

@section('title', 'Detalhes do Produto')

@section('content')
<h1>{{ $product->name }}</h1>

@if($product->image_path)
    <div class="mb-3"><img src="{{ asset('storage/' . $product->image_path) }}" style="max-width:300px"></div>
@endif

<p><strong>Descrição:</strong> {{ $product->description }}</p>
<p><strong>Quantidade:</strong> {{ $product->quantity }}</p>
<p><strong>Preço:</strong> R$ {{ number_format($product->price, 2, ',', '.') }}</p>
<p><strong>Categoria:</strong> {{ $product->category }}</p>

<a href="{{ route('products.index') }}" class="btn btn-secondary">Voltar</a>
<a href="{{ route('products.edit', $product) }}" class="btn btn-warning">Editar</a>

<form action="{{ route('products.destroy', $product) }}" method="POST" style="display:inline-block" onsubmit="return confirm('Remover este produto?');">
    @csrf
    @method('DELETE')
    <button class="btn btn-danger">Remover</button>
</form>

@endsection
