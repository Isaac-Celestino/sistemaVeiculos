@extends('layouts.app')

@section('content')
    <h1>Novo Combustível</h1>

    <form action="{{ route('combustivel.store') }}" method="POST">
        @csrf
        <label for="tipo">Tipo:</label>
        <input type="text" name="tipo" value="{{ old('tipo') }}">
        @error('tipo')
            <div>{{ $message }}</div>
        @enderror
        <button type="submit">Salvar</button>
    </form>

    <a href="{{ route('combustivel.index') }}">Voltar</a>
@endsection
