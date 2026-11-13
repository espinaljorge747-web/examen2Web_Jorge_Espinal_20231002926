@extends('layouts.app')

@section('title', 'Editar medicamento - DISFARMA Honduras')

@section('content')
    <h1 class="h3 mt-2 mb-3">Editar medicamento</h1>
    <div class="card shadow-sm">
        <div class="card-body">
            @include('catalogo._form', [
                'medicamento' => $medicamento,
                'action' => route('catalogo.update', $medicamento),
                'metodo' => 'PUT',
                'boton' => 'Actualizar medicamento',
            ])
        </div>
    </div>
@endsection