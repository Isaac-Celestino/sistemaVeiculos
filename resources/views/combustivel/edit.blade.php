@extends('layouts.app')

@section('content')
    <h1>Editar Combustível</h1>

    <form action="{{ route('combustivel.update', $combustivel) }}" method="POST">
        @csrf
        @method('PUT')

        <label for="tipo">Tipo:</label>
        <input type="text" name="tipo" value="{{ old('tipo', $combustivel->tipo) }}">
        @error('tipo')
            <div>{{ $message }}</div>
        @enderror

        <button type="submit">Atualizar</button>
    </form>

    <a href="{{ route('combustivel.index') }}">Voltar</a>
@endsection
