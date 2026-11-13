@extends('layouts.app')

@section('title', 'Proveedores - DISFARMA Honduras')

@section('content')
    <div class="d-flex flex-wrap justify-content-between align-items-center mb-3 gap-2">
        <h1 class="h3 mb-0">Proveedores</h1>
        <a href="{{ route('proveedores.create') }}" class="btn btn-primary">
            <i class="bi bi-plus-lg me-1"></i>Nuevo proveedor
        </a>
    </div>

    <form method="GET" action="{{ route('proveedores.index') }}" class="mb-3" style="max-width: 420px;">
        <div class="input-group">
            <input type="text" name="buscar" value="{{ request('buscar') }}" class="form-control" placeholder="Buscar por empresa o RTN">
            <button class="btn btn-outline-secondary" type="submit"><i class="bi bi-search"></i></button>
        </div>
    </form>

    <div class="card shadow-sm">
        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table table-hover align-middle mb-0">
                    <thead class="table-light">
                        <tr>
                            <th>RTN</th>
                            <th>Empresa</th>
                            <th>Contacto</th>
                            <th>Teléfono</th>
                            <th>Categoría</th>
                            <th class="text-end">Límite de crédito</th>
                            <th class="text-center">Plazo</th>
                            <th class="text-center">Estado</th>
                            <th class="text-end">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($proveedores as $p)
                            <tr>
                                <td><code>{{ $p->rtn }}</code></td>
                                <td class="fw-semibold">{{ $p->empresa }}</td>
                                <td>{{ $p->contacto }}</td>
                                <td>{{ $p->telefono }}</td>
                                <td>{{ $p->categoria }}</td>
                                <td class="text-end">L. {{ number_format($p->limite_credito, 2) }}</td>
                                <td class="text-center">
                                    <span class="badge bg-info text-dark">{{ $p->dias_credito }} días</span>
                                </td>
                                <td class="text-center">
                                    @if ($p->estado === 'Activo')
                                        <span class="badge bg-success">Activo</span>
                                    @else
                                        <span class="badge bg-secondary">Inactivo</span>
                                    @endif
                                </td>
                                <td class="text-end">
                                    <a href="{{ route('proveedores.edit', $p) }}" class="btn btn-sm btn-outline-primary" title="Editar">
                                        <i class="bi bi-pencil"></i>
                                    </a>
                                    <form action="{{ route('proveedores.destroy', $p) }}" method="POST" class="d-inline"
                                          onsubmit="return confirm('¿Seguro que deseas eliminar este proveedor?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-outline-danger" title="Eliminar">
                                            <i class="bi bi-trash"></i>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="9" class="text-center text-muted py-4">No se encontraron proveedores.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
        <div class="card-footer">
            {{ $proveedores->links() }}
        </div>
    </div>
@endsection