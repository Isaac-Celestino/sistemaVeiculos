<!DOCTYPE html>
<html>
<head>
    <title>Detalhes do Veículo</title>
    <!-- Bootstrap CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<div class="container mt-5">
    <h1 class="mb-4">Detalhes do Veículo</h1>

    <div class="card">
        <div class="card-body">
            <p><strong>ID:</strong> {{ $veiculo->id }}</p>
            <p><strong>Marca:</strong> {{ $veiculo->marca }}</p>
            <p><strong>Modelo:</strong> {{ $veiculo->modelo }}</p>
            <p><strong>Ano:</strong> {{ $veiculo->ano }}</p>
            <p><strong>Cor:</strong> {{ $veiculo->cor ?? '-' }}</p>
            <p><strong>Placa:</strong> {{ $veiculo->placa ?? '-' }}</p>
        </div>
    </div>

    <div class="mt-4">
        <a href="{{ route('veiculos.index') }}" class="btn btn-secondary">Voltar à Lista</a>
        <a href="{{ route('veiculos.edit', $veiculo->id) }}" class="btn btn-warning">Editar Veículo</a>
    </div>
</div>

</body>
</html>
