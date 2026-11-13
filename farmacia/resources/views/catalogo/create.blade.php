@extends('layouts.app')

@section('title', 'Nuevo medicamento - DISFARMA Honduras')

@section('content')
    <h1 class="h3 mt-2 mb-3">Nuevo medicamento</h1>
    <div class="card shadow-sm">
        <div class="card-body">
            @include('catalogo._form', [
                'medicamento' => $medicamento,
                'action' => route('catalogo.store'),
                'metodo' => 'POST',
                'boton' => 'Guardar medicamento',
            ])
        </div>
    </div>
@endsection