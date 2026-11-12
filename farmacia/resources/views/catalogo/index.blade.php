<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="csrf-token" content="{{ csrf_token() }}" />
        <title>Catálogo de medicamentos - DISFARMA Honduras</title>
        <link rel="icon" type="image/png" href="{{ asset('img/logo-disfarma.png') }}" />
        <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet" />
        <link href="{{ asset('estilos/css/styles.css') }}" rel="stylesheet" />
    </head>
    <body class="d-flex flex-column min-vh-100">

        <!-- Navigation-->
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <div class="container px-5">
                <a class="navbar-brand d-flex align-items-center" href="{{ url('/') }}">
                    <img src="{{ asset('img/logo-disfarma.png') }}" alt="Logo DISFARMA" height="32" class="me-2">
                    DISFARMA Honduras
                </a>

                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Mostrar navegación">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link {{ request()->is('dashboard') ? 'active' : '' }}" href="{{ url('/dashboard') }}">Dashboard</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ request()->is('catalogo*') ? 'active' : '' }}" href="{{ url('/catalogo') }}">Medicamentos</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ request()->is('proveedores*') ? 'active' : '' }}" href="{{ url('/proveedores') }}">Proveedores</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ request()->is('empleados*') ? 'active' : '' }}" href="{{ url('/empleados') }}">Empleados</a>
                        </li>
                    </ul>

                    <ul class="navbar-nav ms-auto mb-2 mb-lg-0 align-items-lg-center">
                        @auth
                            <li class="nav-item">
                                <span class="navbar-text text-white me-3">
                                    <i class="bi bi-person-circle"></i> {{ auth()->user()->name }}
                                </span>
                            </li>
                            <li class="nav-item">
                                <form method="POST" action="{{ url('/logout') }}">
                                    @csrf
                                    <button class="btn btn-outline-light btn-sm" type="submit">Cerrar sesión</button>
                                </form>
                            </li>
                        @else
                            <li class="nav-item">
                                <a class="nav-link" href="{{ url('/login') }}">Login</a>
                            </li>
                        @endauth
                    </ul>
                </div>
            </div>
        </nav>

        <!-- Page content-->
        <main class="flex-grow-1 py-4">
            <div class="container-fluid px-4">

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
        </main>

        <!-- Footer-->
        <footer class="bg-dark text-white pt-5 pb-4 mt-auto">
            <div class="container px-5">
                <div class="row gy-4">
                    <div class="col-lg-4">
                        <div class="d-flex align-items-center mb-3">
                            <img src="{{ asset('img/logo-disfarma.png') }}" alt="Logo DISFARMA" height="36" class="me-2">
                            <span class="fw-bolder fs-5">DISFARMA Honduras</span>
                        </div>
                        <p class="small text-white-50 mb-0">
                            Droguería y Distribuidora Farmacéutica San Rafael S. de R.L. Proveedora mayorista de medicamentos genéricos y de marca, antibióticos, insumos médico-quirúrgicos y material hospitalario.
                        </p>
                    </div>
                    <div class="col-6 col-lg-2">
                        <h6 class="text-uppercase fw-bold small mb-3">Sistema</h6>
                        <ul class="list-unstyled small mb-0">
                            <li class="mb-2"><a class="link-light text-decoration-none" href="{{ url('/dashboard') }}">Dashboard</a></li>
                            <li class="mb-2"><a class="link-light text-decoration-none" href="{{ url('/catalogo') }}">Medicamentos</a></li>
                            <li class="mb-2"><a class="link-light text-decoration-none" href="{{ url('/proveedores') }}">Proveedores</a></li>
                            <li class="mb-2"><a class="link-light text-decoration-none" href="{{ url('/empleados') }}">Empleados</a></li>
                        </ul>
                    </div>
                    <div class="col-6 col-lg-3">
                        <h6 class="text-uppercase fw-bold small mb-3">Centros de distribución</h6>
                        <ul class="list-unstyled small text-white-50 mb-0">
                            <li class="mb-2"><i class="bi bi-geo-alt me-1"></i>Principal: Bulevar Suyapa, Tegucigalpa</li>
                            <li><i class="bi bi-geo-alt me-1"></i>Logístico: Bulevar del Norte, San Pedro Sula</li>
                        </ul>
                    </div>
                    <div class="col-lg-3">
                        <h6 class="text-uppercase fw-bold small mb-3">Cobertura</h6>
                        <p class="small text-white-50 mb-0">
                            Clínicas privadas, farmacias comunitarias y hospitales regionales en Francisco Morazán, Cortés, Comayagua y Choluteca.
                        </p>
                    </div>
                </div>
                <hr class="border-secondary my-4">
                <div class="d-flex flex-column flex-sm-row justify-content-between align-items-center small text-white-50">
                    <div>&copy; {{ date('Y') }} Droguería y Distribuidora Farmacéutica San Rafael S. de R.L. Todos los derechos reservados.</div>
                    <div>Sistema de gestión interna · Uso exclusivo para personal autorizado</div>
                </div>
            </div>
        </footer>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    </body>
</html>