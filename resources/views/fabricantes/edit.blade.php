@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Editar Fabricante</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('fabricantes.update', $fabricante->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group mb-3">
            <label for="nome">Nome do Fabricante</label>
            <input type="text" name="nome" id="nome" class="form-control" value="{{ old('nome', $fabricante->nome) }}" required>
        </div>
        
        <div class="form-group mb-3">
            <label for="pais">País</label>
            <input type="text" name="pais" id="pais" class="form-control" value="{{ old('pais', $fabricante->pais) }}" required>
        </div>
        
        <button type="submit" class="btn btn-primary">Atualizar</button>
        <a href="{{ route('fabricantes.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
</div>
@endsection
