            @extends('layouts.app')

            @section('title', 'Medicinas - DISFARMA Honduras')

            @section('content')
                <div class="d-flex flex-wrap justify-content-between align-items-center mb-3 gap-2">
                    <h1 class="h3 mb-0">Catálogo de medicamentos</h1>
                    <a href="{{ route('catalogo.create') }}" class="btn btn-primary">
                        <i class="bi bi-plus-lg me-1"></i>Nuevo medicamento
                    </a>
                </div>

                @if (session('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {{ session('success') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Cerrar"></button>
                    </div>
                @endif

                <form method="GET" action="{{ route('catalogo.index') }}" class="mb-3" style="max-width: 420px;">
                    <div class="input-group">
                        <input type="text" name="buscar" value="{{ request('buscar') }}" class="form-control" placeholder="Buscar por nombre o SKU">
                        <button class="btn btn-outline-secondary" type="submit"><i class="bi bi-search"></i></button>
                    </div>
                </form>

                <div class="card shadow-sm">
                    <div class="card-body p-0">
                        <div class="table-responsive">
                            <table class="table table-hover align-middle mb-0">
                                <thead class="table-light">
                                    <tr>
                                        <th>Foto</th>
                                        <th>SKU</th>
                                        <th>Nombre</th>
                                        <th>Categoría</th>
                                        <th>Laboratorio</th>
                                        <th class="text-end">Precio</th>
                                        <th class="text-center">Existencias</th>
                                        <th>Vence</th>
                                        <th class="text-end">Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($medicamentos as $m)
                                        @php $estado = $m->estadoStock(); @endphp
                                        <tr>
                                            <td style="width: 70px;">
                                                @if ($m->imagen)
                                                    <img src="{{ asset('uploads/medicamentos/' . $m->imagen) }}" alt="{{ $m->nombre }}" class="img-thumbnail" style="width: 56px; height: 56px; object-fit: cover;">
                                                @else
                                                    <span class="text-muted small">Sin foto</span>
                                                @endif
                                            </td>
                                            <td><code>{{ $m->codigo }}</code></td>
                                            <td class="fw-semibold">{{ $m->nombre }}</td>
                                            <td>{{ $m->categoria }}</td>
                                            <td>{{ $m->laboratorio }}</td>
                                            <td class="text-end">L. {{ number_format($m->precio, 2) }}</td>
                                            <td class="text-center">
                                                <span class="badge {{ $estado['clase'] }}">{{ $m->inventario }} · {{ $estado['texto'] }}</span>
                                            </td>
                                            <td>{{ $m->fecha_vencimiento->format('d/m/Y') }}</td>
                                            <td class="text-end">
                                                <a href="{{ route('catalogo.edit', $m) }}" class="btn btn-sm btn-outline-primary" title="Editar">
                                                    <i class="bi bi-pencil"></i>
                                                </a>
                                                <form action="{{ route('catalogo.destroy', $m) }}" method="POST" class="d-inline"
                                                      onsubmit="return confirm('¿Seguro que deseas eliminar este medicamento?');">
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
                                            <td colspan="9" class="text-center text-muted py-4">No se encontraron medicamentos.</td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="card-footer">
                        {{ $medicamentos->links() }}
                    </div>
                </div>

            </div>
        @endsection
       