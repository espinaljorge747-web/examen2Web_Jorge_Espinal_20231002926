@extends('layouts.app')

@section('title', 'Empleados - DISFARMA Honduras')

@section('content')
    <div class="d-flex flex-wrap justify-content-between align-items-center mb-3 gap-2">
        <h1 class="h3 mb-0">Nómina y personal</h1>
        <a href="{{ route('empleados.create') }}" class="btn btn-primary">
            <i class="bi bi-plus-lg me-1"></i>Nuevo empleado
        </a>
    </div>

    <form method="GET" action="{{ route('empleados.index') }}" class="mb-3" style="max-width: 420px;">
        <div class="input-group">
            <input type="text" name="buscar" value="{{ request('buscar') }}" class="form-control" placeholder="Buscar por nombre, apellido o DNI">
            <button class="btn btn-outline-secondary" type="submit"><i class="bi bi-search"></i></button>
        </div>
    </form>

    <div class="card shadow-sm">
        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table table-hover align-middle mb-0">
                    <thead class="table-light">
                        <tr>
                            <th>DNI</th>
                            <th>Nombre</th>
                            <th>Apellido</th>
                            <th>Cargo</th>
                            <th class="text-end">Salario</th>
                            <th>Ingreso</th>
                            <th class="text-center">Estado</th>
                            <th class="text-end">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($empleados as $e)
                            <tr>
                                <td><code>{{ $e->identidad }}</code></td>
                                <td class="fw-semibold">{{ $e->nombre }}</td>
                                <td>{{ $e->apellido }}</td>
                                <td><span class="badge bg-info text-dark">{{ $e->cargo }}</span></td>
                                <td class="text-end">L. {{ number_format($e->salario, 2) }}</td>
                                <td>{{ $e->fecha_ingreso->format('d/m/Y') }}</td>
                                <td class="text-center">
                                    @if ($e->estado === 'Activo')
                                        <span class="badge bg-success">Activo</span>
                                    @else
                                        <span class="badge bg-secondary">Inactivo</span>
                                    @endif
                                </td>
                                <td class="text-end">
                                    <a href="{{ route('empleados.edit', $e) }}" class="btn btn-sm btn-outline-primary" title="Editar">
                                        <i class="bi bi-pencil"></i>
                                    </a>
                                    <form action="{{ route('empleados.destroy', $e) }}" method="POST" class="d-inline"
                                          onsubmit="return confirm('¿Seguro que deseas eliminar este empleado?');">
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
                                <td colspan="8" class="text-center text-muted py-4">No se encontraron empleados.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
        <div class="card-footer">
            {{ $empleados->links() }}
        </div>
    </div>
@endsection