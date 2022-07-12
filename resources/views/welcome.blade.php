@extends('theme.base')

@section('content')

    <div class="container py-5 text-center">
        <h1 class="text-center">AutosVip</h1>
        <a href="{{ route('client.index') }}" class="btn btn-primary">Clientes</a>
    </div>

@endsection