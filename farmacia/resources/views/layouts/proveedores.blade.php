<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content />
        <meta name="author" content />
        <title>Modern Business - Start Bootstrap Template</title>
        <!-- Favicon-->
        <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
        <!-- Bootstrap icons-->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="{{url('estilos/css/styles.css')}}" rel="stylesheet" />
    </head>
    <body class="d-flex flex-column">
        <main class="flex-shrink-0">
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
            <section class="py-5">
                <div class="container px-5">
                    <!-- Contact form-->
                    <div class="bg-light rounded-3 py-5 px-4 px-md-5 mb-5">
                        <div class="text-center mb-5">
                            <div class="feature bg-primary bg-gradient text-white rounded-3 mb-3"><i class="bi bi-envelope"></i></div>
                            <h1 class="fw-bolder">Get in touch</h1>
                            <p class="lead fw-normal text-muted mb-0">We'd love to hear from you</p>
                        </div>
                        <div class="row gx-5 justify-content-center">
                            <div class="col-lg-8 col-xl-6">
                                <!-- * * * * * * * * * * * * * * *-->
                                <!-- * * SB Forms Contact Form * *-->
                                <!-- * * * * * * * * * * * * * * *-->
                                <!-- This form is pre-integrated with SB Forms.-->
                                <!-- To make this form functional, sign up at-->
                                <!-- https://startbootstrap.com/solution/contact-forms-->
                                <!-- to get an API token!-->
                                <form id="contactForm" data-sb-form-api-token="API_TOKEN">
                                    <!-- Name input-->
                                    <div class="form-floating mb-3">
                                        <input class="form-control" id="name" type="text" placeholder="Enter your name..." data-sb-validations="required" />
                                        <label for="name">Full name</label>
                                        <div class="invalid-feedback" data-sb-feedback="name:required">A name is required.</div>
                                    </div>
                                    <!-- Email address input-->
                                    <div class="form-floating mb-3">
                                        <input class="form-control" id="email" type="email" placeholder="name@example.com" data-sb-validations="required,email" />
                                        <label for="email">Email address</label>
                                        <div class="invalid-feedback" data-sb-feedback="email:required">An email is required.</div>
                                        <div class="invalid-feedback" data-sb-feedback="email:email">Email is not valid.</div>
                                    </div>
                                    <!-- Phone number input-->
                                    <div class="form-floating mb-3">
                                        <input class="form-control" id="phone" type="tel" placeholder="(123) 456-7890" data-sb-validations="required" />
                                        <label for="phone">Phone number</label>
                                        <div class="invalid-feedback" data-sb-feedback="phone:required">A phone number is required.</div>
                                    </div>
                                    <!-- Message input-->
                                    <div class="form-floating mb-3">
                                        <textarea class="form-control" id="message" type="text" placeholder="Enter your message here..." style="height: 10rem" data-sb-validations="required"></textarea>
                                        <label for="message">Message</label>
                                        <div class="invalid-feedback" data-sb-feedback="message:required">A message is required.</div>
                                    </div>
                                    <!-- Submit success message-->
                                    <!---->
                                    <!-- This is what your users will see when the form-->
                                    <!-- has successfully submitted-->
                                    <div class="d-none" id="submitSuccessMessage">
                                        <div class="text-center mb-3">
                                            <div class="fw-bolder">Form submission successful!</div>
                                            To activate this form, sign up at
                                            <br />
                                            <a href="https://startbootstrap.com/solution/contact-forms">https://startbootstrap.com/solution/contact-forms</a>
                                        </div>
                                    </div>
                                    <!-- Submit error message-->
                                    <!---->
                                    <!-- This is what your users will see when there is-->
                                    <!-- an error submitting the form-->
                                    <div class="d-none" id="submitErrorMessage"><div class="text-center text-danger mb-3">Error sending message!</div></div>
                                    <!-- Submit Button-->
                                    <div class="d-grid"><button class="btn btn-primary btn-lg disabled" id="submitButton" type="submit">Submit</button></div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <!-- Contact cards-->
                    <div class="row gx-5 row-cols-2 row-cols-lg-4 py-5">
                        <div class="col">
                            <div class="feature bg-primary bg-gradient text-white rounded-3 mb-3"><i class="bi bi-chat-dots"></i></div>
                            <div class="h5 mb-2">Chat with us</div>
                            <p class="text-muted mb-0">Chat live with one of our support specialists.</p>
                        </div>
                        <div class="col">
                            <div class="feature bg-primary bg-gradient text-white rounded-3 mb-3"><i class="bi bi-people"></i></div>
                            <div class="h5">Ask the community</div>
                            <p class="text-muted mb-0">Explore our community forums and communicate with other users.</p>
                        </div>
                        <div class="col">
                            <div class="feature bg-primary bg-gradient text-white rounded-3 mb-3"><i class="bi bi-question-circle"></i></div>
                            <div class="h5">Support center</div>
                            <p class="text-muted mb-0">Browse FAQ's and support articles to find solutions.</p>
                        </div>
                        <div class="col">
                            <div class="feature bg-primary bg-gradient text-white rounded-3 mb-3"><i class="bi bi-telephone"></i></div>
                            <div class="h5">Call us</div>
                            <p class="text-muted mb-0">Call us during normal business hours at (555) 892-9403.</p>
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
        <!-- * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *-->
        <!-- * *                               SB Forms JS                               * *-->
        <!-- * * Activate your form at https://startbootstrap.com/solution/contact-forms * *-->
        <!-- * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *-->
        <script src="https://cdn.startbootstrap.com/sb-forms-latest.js"></script>
    </body>
</html>
