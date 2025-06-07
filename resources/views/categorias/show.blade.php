@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Categoria: {{ $categoria->nome }}</h1>
    <p><strong>ID:</strong> {{ $categoria->id }}</p>
    <p><strong>Criado em:</strong> {{ $categoria->created_at->format('d/m/Y H:i') }}</p>
    <p><strong>Atualizado em:</strong> {{ $categoria->updated_at->format('d/m/Y H:i') }}</p>

    <h3>Veículos nesta categoria</h3>

    <a href="{{ route('veiculos.create', ['categoria_id' => $categoria->id]) }}" class="btn btn-primary mb-3">
        Adicionar Veículo a esta Categoria
    </a>

    @if($categoria->veiculos->isEmpty())
        <p>Não há veículos cadastrados para esta categoria.</p>
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
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                @foreach($categoria->veiculos as $veiculo)
                    <tr>
                        <td>{{ $veiculo->id }}</td>
                        <td>{{ $veiculo->marca }}</td>
                        <td>{{ $veiculo->modelo }}</td>
                        <td>{{ $veiculo->ano }}</td>
                        <td>{{ $veiculo->cor }}</td>
                        <td>{{ $veiculo->placa }}</td>
                        <td>
                            <a href="{{ route('veiculos.show', $veiculo->id) }}" class="btn btn-info btn-sm">Ver</a>
                            <a href="{{ route('veiculos.edit', $veiculo->id) }}" class="btn btn-warning btn-sm">Editar</a>
                            <form action="{{ route('veiculos.destroy', $veiculo->id) }}" method="POST" style="display:inline-block;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Tem certeza?')">Excluir</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif

    <a href="{{ route('categorias.edit', $categoria->id) }}" class="btn btn-warning">Editar</a>
    <a href="{{ route('categorias.index') }}" class="btn btn-secondary">Voltar</a>
</div>
@endsection
