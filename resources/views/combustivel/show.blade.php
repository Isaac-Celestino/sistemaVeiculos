@extends('layouts.app')

@section('content')
    <h1>Visualizar Combustível</h1>
    <p><strong>Tipo:</strong> {{ $combustivel->tipo }}</p>
    <a href="{{ route('combustivel.index') }}">Voltar</a>
@endsection
