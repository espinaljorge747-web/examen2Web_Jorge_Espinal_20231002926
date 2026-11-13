@extends('layouts.app')

@section('title', 'Editar empleado - DISFARMA Honduras')

@section('content')
    <h1 class="h3 mt-2 mb-3">Editar empleado</h1>
    <div class="card shadow-sm">
        <div class="card-body">
            @include('empleados._form', [
                'empleado' => $empleado,
                'action' => route('empleados.update', $empleado),
                'metodo' => 'PUT',
                'boton' => 'Actualizar empleado',
            ])
        </div>
    </div>
@endsection