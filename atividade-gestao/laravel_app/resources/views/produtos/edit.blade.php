@extends('layouts.app')

@section('title', 'Editar Produto')

@section('content')
<h1>Editar Produto</h1>

<form method="POST" action="{{ route('products.update', $product) }}" enctype="multipart/form-data">
    @csrf
    @method('PUT')

    <div class="mb-3">
        <label class="form-label">Nome</label>
        <input type="text" name="name" class="form-control" value="{{ old('name', $product->name) }}">
        @error('name')<div class="text-danger">{{ $message }}</div>@enderror
    </div>

    <div class="mb-3">
        <label class="form-label">Descrição</label>
        <textarea name="description" class="form-control">{{ old('description', $product->description) }}</textarea>
        @error('description')<div class="text-danger">{{ $message }}</div>@enderror
    </div>

    <div class="mb-3">
        <label class="form-label">Quantidade</label>
        <input type="number" name="quantity" class="form-control" value="{{ old('quantity', $product->quantity) }}">
        @error('quantity')<div class="text-danger">{{ $message }}</div>@enderror
    </div>

    <div class="mb-3">
        <label class="form-label">Preço</label>
        <input type="text" name="price" class="form-control" value="{{ old('price', $product->price) }}">
        @error('price')<div class="text-danger">{{ $message }}</div>@enderror
    </div>

    <div class="mb-3">
        <label class="form-label">Categoria</label>
        <input type="text" name="category" class="form-control" value="{{ old('category', $product->category) }}">
        @error('category')<div class="text-danger">{{ $message }}</div>@enderror
    </div>

    <div class="mb-3">
        <label class="form-label">Imagem</label>
        @if($product->image_path)
            <div class="mb-2"><img src="{{ asset('storage/' . $product->image_path) }}" style="max-width:150px"></div>
        @endif
        <input type="file" name="image" class="form-control">
        @error('image')<div class="text-danger">{{ $message }}</div>@enderror
    </div>

    <button class="btn btn-primary">Atualizar</button>
    <a href="{{ route('products.index') }}" class="btn btn-secondary">Cancelar</a>
</form>

@endsection
