{{-- resources/views/veiculos/index.blade.php --}}
@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Veículos Cadastrados</h1>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <a href="{{ route('veiculos.create') }}" class="btn btn-primary mb-3">Cadastrar Novo Veículo</a>

    <div class="table-responsive">
        <table class="table table-bordered table-hover">
            <thead class="table-dark">
                <tr>
                    <th>ID</th>
                    <th>Marca</th>
                    <th>Modelo</th>
                    <th>Ano</th>
                    <th>Cor</th>
                    <th>Placa</th>
                    <th>Categoria</th>
                    <th>Fabricante</th>
                    <th class="text-center">Ações</th>
                </tr>
            </thead>
            <tbody>
                @forelse($veiculos as $veiculo)
                    <tr>
                        <td>{{ $veiculo->id }}</td>
                        <td>{{ $veiculo->marca }}</td>
                        <td>{{ $veiculo->modelo }}</td>
                        <td>{{ $veiculo->ano }}</td>
                        <td>{{ $veiculo->cor ?? '-' }}</td>
                        <td>{{ $veiculo->placa ?? '-' }}</td>
                        <td>{{ $veiculo->categoria->nome ?? '-' }}</td>
                        <td>{{ $veiculo->fabricante->nome ?? '-' }}</td>
                        <td class="text-center">
                            <a href="{{ route('veiculos.show', $veiculo->id) }}" class="btn btn-sm btn-info">Ver</a>
                            <a href="{{ route('veiculos.edit', $veiculo->id) }}" class="btn btn-sm btn-warning">Editar</a>
                            <form action="{{ route('veiculos.destroy', $veiculo->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Tem certeza que deseja excluir?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger">Excluir</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="9" class="text-center">Nenhum veículo cadastrado.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
