@extends('layouts.app')

@section('title', 'Inicio - DISFARMA Honduras')

@section('content')
    <header class="bg-dark py-5 mb-5 rounded-3">
        <div class="container px-5">
            <div class="row gx-5 align-items-center justify-content-center">
                <div class="col-lg-8 col-xl-7 col-xxl-6">
                    <div class="my-5 text-center text-xl-start">
                        <h1 class="display-5 fw-bolder text-white mb-2">Sistema de gestión interna DISFARMA Honduras</h1>
                        <p class="lead fw-normal text-white-50 mb-4">
                            Administra el catálogo de medicamentos, la red de proveedores y la plantilla de personal desde una sola plataforma.
                        </p>
                        <div class="d-grid gap-3 d-sm-flex justify-content-sm-center justify-content-xl-start">
                            <a class="btn btn-primary btn-lg px-4 me-sm-3" href="{{ route('dashboard') }}">Ir al dashboard</a>
                            <a class="btn btn-outline-light btn-lg px-4" href="{{ route('catalogo.index') }}">Ver medicamentos</a>
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
                            <a class="link-primary" href="{{ route('catalogo.index') }}">Ir al catálogo <i class="bi bi-arrow-right"></i></a>
                        </div>

                        <div class="col mb-5 h-100">
                            <div class="feature bg-primary bg-gradient text-white rounded-3 mb-3"><i class="bi bi-truck"></i></div>
                            <h2 class="h5">Proveedores</h2>
                            <p class="mb-2">Laboratorios y suplidores mayoristas con RTN, límite y plazo de crédito, y estado de la relación comercial.</p>
                            <a class="link-primary" href="{{ route('proveedores.index') }}">Ir a proveedores <i class="bi bi-arrow-right"></i></a>
                        </div>

                        <div class="col mb-5 mb-md-0 h-100">
                            <div class="feature bg-primary bg-gradient text-white rounded-3 mb-3"><i class="bi bi-people"></i></div>
                            <h2 class="h5">Empleados</h2>
                            <p class="mb-2">Plantilla de personal y regentes farmacéuticos, con cargo, salario en Lempiras y fecha de ingreso.</p>
                            <a class="link-primary" href="{{ route('empleados.index') }}">Ir a empleados <i class="bi bi-arrow-right"></i></a>
                        </div>

                        <div class="col h-100">
                            <div class="feature bg-primary bg-gradient text-white rounded-3 mb-3"><i class="bi bi-speedometer2"></i></div>
                            <h2 class="h5">Dashboard gerencial</h2>
                            <p class="mb-2">Indicadores clave: total de medicamentos, proveedores activos, empleados en nómina y valor del inventario.</p>
                            <a class="link-primary" href="{{ route('dashboard') }}">Ver indicadores <i class="bi bi-arrow-right"></i></a>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection