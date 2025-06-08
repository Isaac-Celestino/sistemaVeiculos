@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Novo Fabricante</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('fabricantes.store') }}" method="POST">
        @csrf
        <div class="form-group mb-3">
            <label for="nome">Nome do Fabricante</label>
            <input type="text" name="nome" id="nome" class="form-control" value="{{ old('nome') }}" required>
        </div>
        
        <div class="form-group mb-3">
            <label for="pais">País</label>
            <input type="text" name="pais" id="pais" class="form-control" value="{{ old('pais') }}" required>
        </div>
        
        <button type="submit" class="btn btn-primary">Salvar</button>
        <a href="{{ route('fabricantes.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
</div>
@endsection
