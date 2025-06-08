{{-- resources/views/veiculos/edit.blade.php --}}
@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Editar Veículo</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Erros encontrados:</strong>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form method="POST" action="{{ route('veiculos.update', $veiculo->id) }}">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="marca" class="form-label">Marca:</label>
            <input type="text" name="marca" id="marca" class="form-control" value="{{ old('marca', $veiculo->marca) }}" required>
        </div>

        <div class="mb-3">
            <label for="modelo" class="form-label">Modelo:</label>
            <input type="text" name="modelo" id="modelo" class="form-control" value="{{ old('modelo', $veiculo->modelo) }}" required>
        </div>

        <div class="mb-3">
            <label for="ano" class="form-label">Ano:</label>
            <input type="number" name="ano" id="ano" class="form-control" value="{{ old('ano', $veiculo->ano) }}" required>
        </div>

        <div class="mb-3">
            <label for="cor" class="form-label">Cor:</label>
            <input type="text" name="cor" id="cor" class="form-control" value="{{ old('cor', $veiculo->cor) }}">
        </div>

        <div class="mb-3">
            <label for="placa" class="form-label">Placa:</label>
            <input type="text" name="placa" id="placa" class="form-control" value="{{ old('placa', $veiculo->placa) }}">
        </div>

        <div class="mb-3">
            <label for="categoria_id" class="form-label">Categoria:</label>
            <select name="categoria_id" id="categoria_id" class="form-select" required>
                <option value="">-- Selecione uma categoria --</option>
                @foreach($categorias as $categoria)
                    <option value="{{ $categoria->id }}" {{ old('categoria_id', $veiculo->categoria_id) == $categoria->id ? 'selected' : '' }}>
                        {{ $categoria->nome }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="fabricante_id" class="form-label">Fabricante:</label>
            <select name="fabricante_id" id="fabricante_id" class="form-select" required>
                <option value="">-- Selecione um fabricante --</option>
                @foreach($fabricantes as $fabricante)
                    <option value="{{ $fabricante->id }}" {{ old('fabricante_id', $veiculo->fabricante_id) == $fabricante->id ? 'selected' : '' }}>
                        {{ $fabricante->nome }}
                    </option>
                @endforeach
            </select>
        </div>

        <button type="submit" class="btn btn-success">Atualizar</button>
        <a href="{{ route('veiculos.index') }}" class="btn btn-secondary">Voltar à lista</a>
    </form>
</div>
@endsection
