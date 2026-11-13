@extends('layouts.app')

@section('title', 'Nuevo proveedor - DISFARMA Honduras')

@section('content')
    <h1 class="h3 mt-2 mb-3">Nuevo proveedor</h1>
    <div class="card shadow-sm">
        <div class="card-body">
            @include('proveedores._form', [
                'proveedor' => $proveedor,
                'action' => route('proveedores.store'),
                'metodo' => 'POST',
                'boton' => 'Guardar proveedor',
            ])
        </div>
    </div>
@endsection