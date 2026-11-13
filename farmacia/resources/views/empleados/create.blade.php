@extends('layouts.app')

@section('title', 'Nuevo empleado - DISFARMA Honduras')

@section('content')
    <h1 class="h3 mt-2 mb-3">Nuevo empleado</h1>
    <div class="card shadow-sm">
        <div class="card-body">
            @include('empleados._form', [
                'empleado' => $empleado,
                'action' => route('empleados.store'),
                'metodo' => 'POST',
                'boton' => 'Guardar empleado',
            ])
        </div>
    </div>
@endsection