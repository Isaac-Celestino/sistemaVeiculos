@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Fabricante: {{ $fabricante->nome }}</h1>
    <p><strong>ID:</strong> {{ $fabricante->id }}</p>
    <p><strong>País:</strong> {{ $fabricante->pais }}</p>
    <p><strong>Criado em:</strong> {{ $fabricante->created_at->format('d/m/Y H:i') }}</p>
    <p><strong>Atualizado em:</strong> {{ $fabricante->updated_at->format('d/m/Y H:i') }}</p>

    <h3>Veículos deste fabricante</h3>

    @if($fabricante->veiculos->isEmpty())
        <p>Não há veículos cadastrados para este fabricante.</p>
    @else
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Marca</th>
                    <th>Modelo</th>
                    <th>Ano</th>
                    <th>Cor</th>
                    <th>Placa</th>
                    <th>Categoria</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                @foreach($fabricante->veiculos as $veiculo)
                    <tr>
                        <td>{{ $veiculo->id }}</td>
                        <td>{{ $veiculo->marca }}</td>
                        <td>{{ $veiculo->modelo }}</td>
                        <td>{{ $veiculo->ano }}</td>
                        <td>{{ $veiculo->cor }}</td>
                        <td>{{ $veiculo->placa }}</td>
                        <td>{{ $veiculo->categoria->nome ?? '-' }}</td>
                        <td>
                            <a href="{{ route('veiculos.show', $veiculo->id) }}" class="btn btn-info btn-sm">Ver</a>
                            <a href="{{ route('veiculos.edit', $veiculo->id) }}" class="btn btn-warning btn-sm">Editar</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif

    <a href="{{ route('fabricantes.edit', $fabricante->id) }}" class="btn btn-warning">Editar</a>
    <a href="{{ route('fabricantes.index') }}" class="btn btn-secondary">Voltar</a>
</div>
@endsection
