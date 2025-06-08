@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Fabricantes</h1>
    <a href="{{ route('fabricantes.create') }}" class="btn btn-primary mb-3">Novo Fabricante</a>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nome</th>
                <th>País</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            @foreach($fabricantes as $fabricante)
                <tr>
                    <td>{{ $fabricante->id }}</td>
                    <td>{{ $fabricante->nome }}</td>
                    <td>{{ $fabricante->pais ?? '-' }}</td>
                    <td>
                        <a href="{{ route('fabricantes.show', $fabricante->id) }}" class="btn btn-info btn-sm">Ver</a>
                        <a href="{{ route('fabricantes.edit', $fabricante->id) }}" class="btn btn-warning btn-sm">Editar</a>
                        <form action="{{ route('fabricantes.destroy', $fabricante->id) }}" method="POST" style="display:inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Tem certeza?')">Excluir</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
