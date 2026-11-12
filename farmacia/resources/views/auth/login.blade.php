<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="csrf-token" content="{{ csrf_token() }}" />
        <title>Iniciar Sesión - DISFARMA Honduras</title>
        <link rel="icon" type="image/png" href="{{ asset('img/logo-disfarma.png') }}" />
        <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet" />
        <link href="{{ asset('estilos/css/styles.css') }}" rel="stylesheet" />
    </head>
    <body class="d-flex flex-column bg-light">
        <main class="flex-grow-1 d-flex align-items-center py-5">
            <div class="container px-5">
                <div class="row justify-content-center">
                    <div class="col-lg-6 col-xl-5">
                        <div class="bg-white rounded-3 shadow-sm py-5 px-4 px-md-5">
                            <div class="text-center mb-4">
                                <img src="{{ asset('img/logo-disfarma.png') }}" alt="Logo DISFARMA" height="64" class="mb-3">
                                <h1 class="fw-bolder h3">Iniciar sesión</h1>
                                <p class="text-muted mb-0">Sistema de gestión interna DISFARMA Honduras</p>
                            </div>
                            @if (session('success'))
                                <div class="alert alert-success alert-dismissible fade show" role="alert">
                                    {{ session('success') }}
                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Cerrar"></button>
                                </div>
                            @endif

                            <form method="POST" action="{{ url('/login') }}" id="loginForm" novalidate>
                                @csrf
                                <div class="form-floating mb-3">
                                    <input
                                        class="form-control @error('email') is-invalid @enderror"
                                        id="email"
                                        type="email"
                                        name="email"
                                        value="{{ old('email') }}"
                                        placeholder="usuario@disfarma.hn"
                                        pattern="^[^@\s]+@disfarma\.hn$"
                                        autocomplete="username"
                                        autofocus
                                        required
                                    />
                                    <label for="email">Correo institucional</label>
                                    <div class="invalid-feedback">
                                        {{ $errors->first('email') ?: 'Ingresa un correo válido terminado en @disfarma.hn.' }}
                                    </div>
                                </div>
                                <div class="form-floating mb-3">
                                    <input
                                        class="form-control @error('password') is-invalid @enderror"
                                        id="password"
                                        type="password"
                                        name="password"
                                        placeholder="Contraseña"
                                        autocomplete="current-password"
                                        required
                                    />
                                    <label for="password">Contraseña</label>
                                    <div class="invalid-feedback">
                                        {{ $errors->first('password') ?: 'La contraseña es obligatoria.' }}
                                    </div>
                                </div>

                                <div class="form-check mb-4">
                                    <input class="form-check-input" type="checkbox" id="remember" name="remember" value="1" {{ old('remember') ? 'checked' : '' }} />
                                    <label class="form-check-label" for="remember">Recordar mi sesión</label>
                                </div>


                                <div class="d-grid">
                                    <button class="btn btn-primary btn-lg" type="submit">
                                        <i class="bi bi-box-arrow-in-right me-1"></i>Ingresar
                                    </button>
                                </div>
                            </form>

                            <p class="small text-muted text-center mt-4 mb-0">Uso exclusivo para personal autorizado.</p>
                        </div>
                    </div>
                </div>
            </div>
        </main>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
        <script>
            document.getElementById('loginForm').addEventListener('submit', function (e) {
                if (!this.checkValidity()) {
                    e.preventDefault();
                    e.stopPropagation();
                }
                this.classList.add('was-validated');
            });
        </script>
    </body>
</html>