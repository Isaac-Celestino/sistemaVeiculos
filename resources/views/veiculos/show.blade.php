{{-- resources/views/veiculos/show.blade.php --}}
@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Detalhes do Veículo</h1>

    <div class="card">
        <div class="card-body">
            <p><strong>ID:</strong> {{ $veiculo->id }}</p>
            <p><strong>Marca:</strong> {{ $veiculo->marca }}</p>
            <p><strong>Modelo:</strong> {{ $veiculo->modelo }}</p>
            <p><strong>Ano:</strong> {{ $veiculo->ano }}</p>
            <p><strong>Cor:</strong> {{ $veiculo->cor ?? '-' }}</p>
            <p><strong>Placa:</strong> {{ $veiculo->placa ?? '-' }}</p>
            <p><strong>Categoria:</strong> {{ $veiculo->categoria->nome ?? '-' }}</p>
            <p><strong>Fabricante:</strong> {{ $veiculo->fabricante->nome ?? '-' }}</p>
        </div>
    </div>

    <div class="mt-4">
        <a href="{{ route('veiculos.index') }}" class="btn btn-secondary">Voltar à Lista</a>
        <a href="{{ route('veiculos.edit', $veiculo->id) }}" class="btn btn-warning">Editar Veículo</a>
    </div>
</div>
@endsection
