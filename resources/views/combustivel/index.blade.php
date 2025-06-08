@extends('layouts.app')

@section('content')
    <h1>Lista de Combustíveis</h1>

    <a href="{{ route('combustivel.create') }}">Novo Combustível</a>

    @if(session('success'))
        <p>{{ session('success') }}</p>
    @endif

    <ul>
        @foreach($combustiveis as $c)
            <li>
                {{ $c->tipo }}
                <a href="{{ route('combustivel.edit', $c) }}">Editar</a>
                <form action="{{ route('combustivel.destroy', $c) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit">Excluir</button>
                </form>
            </li>
        @endforeach
    </ul>
@endsection
