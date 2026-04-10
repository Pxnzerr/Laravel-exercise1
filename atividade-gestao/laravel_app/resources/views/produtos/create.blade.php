@extends('layouts.app')

@section('title', 'Criar Produto')

@section('content')
<h1>Criar Produto</h1>

<form method="POST" action="{{ route('products.store') }}" enctype="multipart/form-data">
    @csrf

    <div class="mb-3">
        <label class="form-label">Nome</label>
        <input type="text" name="name" class="form-control" value="{{ old('name') }}">
        @error('name')<div class="text-danger">{{ $message }}</div>@enderror
    </div>

    <div class="mb-3">
        <label class="form-label">Descrição</label>
        <textarea name="description" class="form-control">{{ old('description') }}</textarea>
        @error('description')<div class="text-danger">{{ $message }}</div>@enderror
    </div>

    <div class="mb-3">
        <label class="form-label">Quantidade</label>
        <input type="number" name="quantity" class="form-control" value="{{ old('quantity', 0) }}">
        @error('quantity')<div class="text-danger">{{ $message }}</div>@enderror
    </div>

    <div class="mb-3">
        <label class="form-label">Preço</label>
        <input type="text" name="price" class="form-control" value="{{ old('price') }}">
        @error('price')<div class="text-danger">{{ $message }}</div>@enderror
    </div>

    <div class="mb-3">
        <label class="form-label">Categoria</label>
        <input type="text" name="category" class="form-control" value="{{ old('category') }}">
        @error('category')<div class="text-danger">{{ $message }}</div>@enderror
    </div>

    <div class="mb-3">
        <label class="form-label">Imagem</label>
        <input type="file" name="image" class="form-control">
        @error('image')<div class="text-danger">{{ $message }}</div>@enderror
    </div>

    <button class="btn btn-primary">Salvar</button>
    <a href="{{ route('products.index') }}" class="btn btn-secondary">Cancelar</a>
</form>

@endsection
