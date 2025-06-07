<!DOCTYPE html>
<html>
<head>
    <title>Editar Veículo</title>
    <!-- Bootstrap CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<div class="container mt-5">
    <h1 class="mb-4">Editar Veículo</h1>

    {{-- Mensagens de erro --}}
    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Erros encontrados:</strong>
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form method="POST" action="{{ route('veiculos.update', $veiculo->id) }}">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="marca" class="form-label">Marca:</label>
            <input type="text" name="marca" id="marca" class="form-control" value="{{ old('marca', $veiculo->marca) }}" required>
        </div>

        <div class="mb-3">
            <label for="modelo" class="form-label">Modelo:</label>
            <input type="text" name="modelo" id="modelo" class="form-control" value="{{ old('modelo', $veiculo->modelo) }}" required>
        </div>

        <div class="mb-3">
            <label for="ano" class="form-label">Ano:</label>
            <input type="number" name="ano" id="ano" class="form-control" value="{{ old('ano', $veiculo->ano) }}" required>
        </div>

        <div class="mb-3">
            <label for="cor" class="form-label">Cor:</label>
            <input type="text" name="cor" id="cor" class="form-control" value="{{ old('cor', $veiculo->cor) }}">
        </div>

        <div class="mb-3">
            <label for="placa" class="form-label">Placa:</label>
            <input type="text" name="placa" id="placa" class="form-control" value="{{ old('placa', $veiculo->placa) }}">
        </div>

        <div class="mb-3">
            <label for="categoria_id" class="form-label">Categoria:</label>
            <select name="categoria_id" id="categoria_id" class="form-select" required>
                <option value="">-- Selecione uma categoria --</option>
                @foreach($categorias as $categoria)
                    <option value="{{ $categoria->id }}" {{ old('categoria_id', $veiculo->categoria_id) == $categoria->id ? 'selected' : '' }}>
                        {{ $categoria->nome }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="fabricante_id" class="form-label">Fabricante:</label>
            <select name="fabricante_id" id="fabricante_id" class="form-select" required>
                <option value="">-- Selecione um fabricante --</option>
                @foreach($fabricantes as $fabricante)
                    <option value="{{ $fabricante->id }}" {{ old('fabricante_id', $veiculo->fabricante_id) == $fabricante->id ? 'selected' : '' }}>
                        {{ $fabricante->nome }}
                    </option>
                @endforeach
            </select>
        </div>

        <button type="submit" class="btn btn-success">Atualizar</button>
        <a href="{{ route('veiculos.index') }}" class="btn btn-secondary">Voltar à lista</a>
    </form>
</div>

</body>
</html>
