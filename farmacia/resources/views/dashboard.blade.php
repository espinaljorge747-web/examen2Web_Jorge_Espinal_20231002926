@extends('layouts.app')

@section('title', 'Dashboard - DISFARMA Honduras')

@section('content')
    <h1 class="h3 mt-2 mb-1">Dashboard gerencial</h1>
    <p class="text-muted mb-4">Indicadores clave de catálogo, proveedores y nómina.</p>

    <div class="row">
        <div class="col-xl-3 col-md-6">
            <div class="card bg-primary text-white mb-4">
                <div class="card-body">
                    <div class="small text-white-50">Total de medicamentos en catálogo</div>
                    <div class="fs-3 fw-bold">{{ number_format($totalMedicamentos) }}</div>
                </div>
                <div class="card-footer d-flex align-items-center justify-content-between">
                    <a class="small text-white stretched-link" href="{{ route('catalogo.index') }}">Ver catálogo</a>
                    <i class="bi bi-capsule"></i>
                </div>
            </div>
        </div>

        <div class="col-xl-3 col-md-6">
            <div class="card bg-success text-white mb-4">
                <div class="card-body">
                    <div class="small text-white-50">Proveedores activos</div>
                    <div class="fs-3 fw-bold">{{ number_format($proveedoresActivos) }}</div>
                </div>
                <div class="card-footer d-flex align-items-center justify-content-between">
                    <a class="small text-white stretched-link" href="{{ route('proveedores.index') }}">Ver proveedores</a>
                    <i class="bi bi-truck"></i>
                </div>
            </div>
        </div>

        <div class="col-xl-3 col-md-6">
            <div class="card bg-warning text-dark mb-4">
                <div class="card-body">
                    <div class="small">Empleados en nómina</div>
                    <div class="fs-3 fw-bold">{{ number_format($totalEmpleados) }}</div>
                </div>
                <div class="card-footer d-flex align-items-center justify-content-between">
                    <a class="small text-dark stretched-link" href="{{ route('empleados.index') }}">Ver empleados</a>
                    <i class="bi bi-people"></i>
                </div>
            </div>
        </div>

        <div class="col-xl-3 col-md-6">
            <div class="card bg-danger text-white mb-4">
                <div class="card-body">
                    <div class="small text-white-50">Valor del inventario</div>
                    <div class="fs-3 fw-bold">L. {{ number_format($valorInventario, 2) }}</div>
                </div>
                <div class="card-footer d-flex align-items-center justify-content-between">
                    <a class="small text-white stretched-link" href="{{ route('catalogo.index') }}">Ver inventario</a>
                    <i class="bi bi-box-seam"></i>
                </div>
            </div>
        </div>
    </div>
@endsection