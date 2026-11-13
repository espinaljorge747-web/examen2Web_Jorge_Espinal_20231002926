@extends('layouts.app')

@section('title', 'Editar proveedor - DISFARMA Honduras')

@section('content')
    <h1 class="h3 mt-2 mb-3">Editar proveedor</h1>
    <div class="card shadow-sm">
        <div class="card-body">
            @include('proveedores._form', [
                'proveedor' => $proveedor,
                'action' => route('proveedores.update', $proveedor),
                'metodo' => 'PUT',
                'boton' => 'Actualizar proveedor',
            ])
        </div>
    </div>
@endsection