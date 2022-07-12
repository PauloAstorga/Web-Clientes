@extends('theme.base')

@section('content')

    <div class="container py-5 text-center">

        @if (isset($client))
            <h1>Editar Cliente</h1>
        @else
            <h1>Crear Cliente</h1>
        @endif

        <div class="container">
            @if (isset($client))
                <form action="{{ route('client.update', $client) }}" method="POST">
                @method('PUT')
            @else
                <form action="{{ route('client.store') }}" method="POST">
            @endif
            <form action="{{ route('client.store') }}" method="POST">
                @csrf
                <div class="mb-3 row">
                    <label for="name" class="col-xs-4 col-form-label">Nombre</label>
                    <div class="col-xs-8">
                        <input type="text" class="form-control" name="name" id="name" placeholder="Nombre" value="{{ old('name') ?? @$client->name }}">
                        <p class="form-text text-muted">
                            Escriba el nombre del Cliente
                        </p>
                        @error('name')
                            <p class="form-text text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <div class="mb-3 row">
                    <label for="due" class="col-xs-4 col-form-label">Saldo</label>
                    <div class="col-xs-8">
                        <input type="number" step="0.01" class="form-control" name="due" id="due" placeholder="Saldo del Cliente" value="{{ old('due') ?? @$client->due }}">
                        <p class="form-text text-muted">
                            Ingrese el saldo del Cliente
                        </p>
                        @error('due')
                            <p class="form-text text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <div class="mb-3">
                    <label for="comments" class="form-label">Comentarios</label>
                    <textarea class="form-control" name="comments" id="comments" placeholder="Comentarios" rows="3">{{ old('comments') ?? @$client->comments }}</textarea>
                    <p class="form-text text-muted">
                        Ingrese los comentarios del cliente
                    </p>
                    @error('comments')
                            <p class="form-text text-danger">{{ $message }}</p>
                        @enderror
                </div>

                <div class="mb-3 row">
                    <div class="offset-sm-4 col-sm-8">

                        @if (isset($client))
                            <button type="submit" class="btn btn-primary">Guardar</button>
                        @else
                            <button type="submit" class="btn btn-primary">Crear</button>
                        @endif
                        <a href="{{ route('client.index') }}" class="btn btn-secondary">Volver</a>
                    </div>
                </div>
            </form>
        </div>
        
    </div>

@endsection