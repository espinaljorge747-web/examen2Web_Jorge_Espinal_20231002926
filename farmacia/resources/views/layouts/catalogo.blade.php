<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Modern Business - Start Bootstrap Template</title>
        <!-- Favicon-->
        <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
        <!-- Bootstrap icons-->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="{{url('estilos/css/styles.css')}}" rel="stylesheet" />
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
                                    <a class="nav-link" href="{{ url('/login') }}">Login</a>
                                </li>
                            @endauth
                        </ul>
                    </div>
                </div>
            </nav>
            <!-- Page Content-->
            <section class="py-5">
                <div class="container px-5 my-5">
                    <div class="row gx-5 justify-content-center">
                        <div class="col-lg-6">
                            <div class="text-center mb-5">
                                <h1 class="fw-bolder">Project Title</h1>
                                <p class="lead fw-normal text-muted mb-0">Lorem ipsum dolor sit amet consectetur adipisicing elit. Ab similique, ducimus ut alias sit accusamus illum, asperiores deserunt dolorum quaerat qui! Ab, quisquam explicabo magni dolores unde beatae quam a.</p>
                            </div>
                        </div>
                    </div>
                    <div class="row gx-5">
                        <div class="col-12"><img class="img-fluid rounded-3 mb-5" src="https://dummyimage.com/1300x700/343a40/6c757d" alt="..." /></div>
                        <div class="col-lg-6"><img class="img-fluid rounded-3 mb-5" src="https://dummyimage.com/600x400/343a40/6c757d" alt="..." /></div>
                        <div class="col-lg-6"><img class="img-fluid rounded-3 mb-5" src="https://dummyimage.com/600x400/343a40/6c757d" alt="..." /></div>
                    </div>
                    <div class="row gx-5 justify-content-center">
                        <div class="col-lg-6">
                            <div class="text-center mb-5">
                                <p class="lead fw-normal text-muted">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Totam deserunt architecto enim eos accusantium fugit recusandae illo iste dignissimos possimus facere ducimus odit voluptatibus exercitationem, ex laudantium illum voluptatum corporis.</p>
                                <a class="text-decoration-none" href="#!">
                                    View project
                                    <i class="bi-arrow-right"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
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
        <!-- Bootstrap core JS-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Core theme JS-->
        <script src="js/scripts.js"></script>
    </body>
</html>
