<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Lista de Fabricantes</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<div class="container mt-5">
    <h1 class="mb-4">Lista de Fabricantes</h1>

    {{-- Mensagem de sucesso --}}
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <a href="{{ route('fabricantes.create') }}" class="btn btn-primary mb-3">Novo Fabricante</a>

    @if($fabricantes->count())
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nome</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                @foreach($fabricantes as $fabricante)
                    <tr>
                        <td>{{ $fabricante->id }}</td>
                        <td>{{ $fabricante->nome }}</td>
                        <td>
                            <a href="{{ route('fabricantes.show', $fabricante->id) }}" class="btn btn-info btn-sm">Ver</a>
                            <a href="{{ route('fabricantes.edit', $fabricante->id) }}" class="btn btn-warning btn-sm">Editar</a>
                            <form action="{{ route('fabricantes.destroy', $fabricante->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Tem certeza que deseja excluir?')">Excluir</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @else
        <p>Nenhum fabricante cadastrado.</p>
    @endif
</div>

</body>
</html>
