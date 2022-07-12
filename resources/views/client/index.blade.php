@extends('theme.base')

@section('content')

    <div class="container py-5 text-center">
        <h1 class="text-center">Listado de Clientes</h1>
        <a href="{{ route('client.create') }}" class="btn btn-primary">Crear Cliente</a>

        @if (Session::has('mensaje'))
            <div class="alert alert-info my-5">
                {{ Session::get('mensaje') }}
            </div>
        @endif

        <table class="table">
            <thead>
                <tr>
                    <th>Nombre</th>
                    <th>Saldo</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($clients as $cliente)
                    <tr>
                        <td> {{ $cliente->name }} </td>
                        <td> {{ $cliente->due }} </td>
                        <td>
                            <a href="{{ route('client.edit', $cliente) }}" class="btn btn-warning">Editar</a>

                            <form action="{{ route('client.destroy', $cliente) }}" method="POST" class="d-inline">
                                @method('DELETE')
                                @csrf
                                <button type="submit" class="btn btn-danger">Eliminar</button>

                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="3">
                            No hay registros.
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>

        @if ($clients->count())
            {{ $clients->links() }}
        @endif
        
        
    </div>

@endsection