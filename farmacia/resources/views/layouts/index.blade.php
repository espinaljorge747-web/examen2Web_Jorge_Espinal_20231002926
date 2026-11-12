<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="csrf-token" content="{{ csrf_token() }}" />
        <title>Inicio - DISFARMA Honduras</title>
        <link rel="icon" type="image/png" href="{{ asset('img/logo-disfarma.png') }}" />
        <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet" />
        <link href="{{ asset('estilos/css/styles.css') }}" rel="stylesheet" />
    </head>
    <body class="d-flex flex-column h-100">
        <main class="flex-shrink-0">
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
                                    <a class="nav-link {{ request()->is('login') ? 'active' : '' }}" href="{{ url('/login') }}">Login</a>
                                </li>
                            @endauth
                        </ul>
                    </div>
                </div>
            </nav>
            <header class="bg-dark py-5">
                <div class="container px-5">
                    <div class="row gx-5 align-items-center justify-content-center">
                        <div class="col-lg-8 col-xl-7 col-xxl-6">
                            <div class="my-5 text-center text-xl-start">
                                <h1 class="display-5 fw-bolder text-white mb-2">Sistema de gestión interna DISFARMA Honduras</h1>
                                <p class="lead fw-normal text-white-50 mb-4">
                                    Administra el catálogo de medicamentos, la red de proveedores y la plantilla de personal desde una sola plataforma.
                                </p>
                                <div class="d-grid gap-3 d-sm-flex justify-content-sm-center justify-content-xl-start">
                                    <a class="btn btn-primary btn-lg px-4 me-sm-3" href="{{ url('/dashboard') }}">Ir al dashboard</a>
                                    <a class="btn btn-outline-light btn-lg px-4" href="{{ url('/catalogo') }}">Ver medicamentos</a>
                                </div>
                            </div>
                        </div>
                       <div class="col-xl-5 col-xxl-6 d-none d-xl-block text-center">
                            <img class="img-fluid rounded-3 my-5" src="{{ asset('img/farmacia.jpg') }}" alt="Imagen de DISFARMA Honduras">
                       </div>
                    </div>
                </div>
            </header>
            <section class="py-5" id="modulos">
                <div class="container px-5 my-5">
                    <div class="row gx-5">
                        <div class="col-lg-4 mb-5 mb-lg-0">
                            <h2 class="fw-bolder mb-0">Módulos del sistema</h2>
                        </div>
                        <div class="col-lg-8">
                            <div class="row gx-5 row-cols-1 row-cols-md-2">

                                <div class="col mb-5 h-100">
                                    <div class="feature bg-primary bg-gradient text-white rounded-3 mb-3"><i class="bi bi-capsule"></i></div>
                                    <h2 class="h5">Medicamentos</h2>
                                    <p class="mb-2">Catálogo e inventario con código SKU, precios, lotes, fechas de vencimiento y fotografías de empaques.</p>
                                    <a class="link-primary" href="{{ url('/catalogo') }}">Ir al catálogo <i class="bi bi-arrow-right"></i></a>
                                </div>

                                <div class="col mb-5 h-100">
                                    <div class="feature bg-primary bg-gradient text-white rounded-3 mb-3"><i class="bi bi-truck"></i></div>
                                    <h2 class="h5">Proveedores</h2>
                                    <p class="mb-2">Laboratorios y suplidores mayoristas con RTN, límite y plazo de crédito, y estado de la relación comercial.</p>
                                    <a class="link-primary" href="{{ url('/proveedores') }}">Ir a proveedores <i class="bi bi-arrow-right"></i></a>
                                </div>

                                <div class="col mb-5 mb-md-0 h-100">
                                    <div class="feature bg-primary bg-gradient text-white rounded-3 mb-3"><i class="bi bi-people"></i></div>
                                    <h2 class="h5">Empleados</h2>
                                    <p class="mb-2">Plantilla de personal y regentes farmacéuticos, con cargo, salario en Lempiras y fecha de ingreso.</p>
                                    <a class="link-primary" href="{{ url('/empleados') }}">Ir a empleados <i class="bi bi-arrow-right"></i></a>
                                </div>

                                <div class="col h-100">
                                    <div class="feature bg-primary bg-gradient text-white rounded-3 mb-3"><i class="bi bi-speedometer2"></i></div>
                                    <h2 class="h5">Dashboard gerencial</h2>
                                    <p class="mb-2">Indicadores clave: total de medicamentos, proveedores activos, empleados en nómina y valor del inventario.</p>
                                    <a class="link-primary" href="{{ url('/dashboard') }}">Ver indicadores <i class="bi bi-arrow-right"></i></a>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </main>
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