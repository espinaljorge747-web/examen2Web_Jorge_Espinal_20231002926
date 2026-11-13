<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="csrf-token" content="{{ csrf_token() }}" />
        <title>@yield('title', 'DISFARMA Honduras')</title>
        <link rel="icon" type="image/png" href="{{ asset('img/logo-disfarma.png') }}" />
        <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet" />
        <link href="{{ asset('estilos/css/styles.css') }}" rel="stylesheet" />
    </head>
    <body class="d-flex flex-column min-vh-100">
        <nav class="navbar navbar-dark bg-dark px-3">
            <div class="d-flex align-items-center">
                <button class="btn btn-outline-light btn-sm d-lg-none me-2" type="button"
                        data-bs-toggle="collapse" data-bs-target="#menuLateral" aria-controls="menuLateral" aria-expanded="false" aria-label="Mostrar menú">
                    <i class="bi bi-list"></i>
                </button>
                <span class="navbar-brand mb-0 h5">DISFARMA Honduras</span>
            </div>

            <div class="ms-auto d-flex align-items-center">
                <span class="text-white me-3">
                    <i class="bi bi-person-circle"></i> {{ auth()->user()->name }}
                </span>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button class="btn btn-outline-light btn-sm" type="submit">Cerrar sesión</button>
                </form>
            </div>
        </nav>

        <div class="d-flex flex-grow-1">
            <aside class="bg-dark text-white p-3 collapse d-lg-block" id="menuLateral" style="min-width: 240px;">
                <a href="{{ url('/') }}" class="d-flex align-items-center mb-4 text-white text-decoration-none">
                    <img src="{{ asset('img/logo-disfarma.png') }}" alt="Logo DISFARMA" height="40" class="me-2">
                    <span class="fw-bold">DISFARMA</span>
                </a>

                <ul class="nav flex-column gap-1">
                    <li class="nav-item">
                        <a class="nav-link text-white {{ request()->routeIs('dashboard') ? 'active bg-primary' : '' }}" href="{{ route('dashboard') }}">
                            <i class="bi bi-speedometer2 me-2"></i>Dashboard
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white {{ request()->routeIs('catalogo.*') ? 'active bg-primary' : '' }}" href="{{ route('catalogo.index') }}">
                            <i class="bi bi-capsule me-2"></i>Medicamentos
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white {{ request()->routeIs('proveedores.*') ? 'active bg-primary' : '' }}" href="{{ route('proveedores.index') }}">
                            <i class="bi bi-truck me-2"></i>Proveedores
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white {{ request()->routeIs('empleados.*') ? 'active bg-primary' : '' }}" href="{{ route('empleados.index') }}">
                            <i class="bi bi-people me-2"></i>Empleados
                        </a>
                    </li>
                </ul>
            </aside>
            <main class="flex-grow-1 p-4">
                @if (session('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {{ session('success') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Cerrar"></button>
                    </div>
                @endif

                @yield('content')
            </main>
        </div>
        <footer class="bg-dark text-white pt-5 pb-4">
            <div class="container px-5">
                <div class="row gy-4">
                    <div class="col-lg-4">
                        <a href="{{ url('/') }}" class="d-flex align-items-center mb-3 text-white text-decoration-none">
                            <img src="{{ asset('img/logo-disfarma.png') }}" alt="Logo DISFARMA" height="36" class="me-2">
                            <span class="fw-bolder fs-5">DISFARMA Honduras</span>
                        </a>
                        <p class="small text-white-50 mb-0">
                            Droguería y Distribuidora Farmacéutica San Rafael S. de R.L. Proveedora mayorista de medicamentos genéricos y de marca, antibióticos, insumos médico-quirúrgicos y material hospitalario.
                        </p>
                    </div>
                    <div class="col-6 col-lg-2">
                        <h6 class="text-uppercase fw-bold small mb-3">Sistema</h6>
                        <ul class="list-unstyled small mb-0">
                            <li class="mb-2"><a class="link-light text-decoration-none" href="{{ route('dashboard') }}">Dashboard</a></li>
                            <li class="mb-2"><a class="link-light text-decoration-none" href="{{ route('catalogo.index') }}">Medicamentos</a></li>
                            <li class="mb-2"><a class="link-light text-decoration-none" href="{{ route('proveedores.index') }}">Proveedores</a></li>
                            <li class="mb-2"><a class="link-light text-decoration-none" href="{{ route('empleados.index') }}">Empleados</a></li>
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