<form action="{{ $action }}" method="POST">
    @csrf
    @if ($metodo !== 'POST')
        @method($metodo)
    @endif

    <div class="row g-3">

        <div class="col-md-4">
            <label for="identidad" class="form-label">DNI (13 dígitos, sin guiones)</label>
            <input id="identidad" type="text" name="identidad" inputmode="numeric" maxlength="13"
                   class="form-control @error('identidad') is-invalid @enderror"
                   value="{{ old('identidad', $empleado->identidad) }}" required>
            @error('identidad') <div class="invalid-feedback">{{ $message }}</div> @enderror
        </div>

        <div class="col-md-4">
            <label for="nombre" class="form-label">Nombre</label>
            <input id="nombre" type="text" name="nombre" class="form-control @error('nombre') is-invalid @enderror"
                   value="{{ old('nombre', $empleado->nombre) }}" required>
            @error('nombre') <div class="invalid-feedback">{{ $message }}</div> @enderror
        </div>

        <div class="col-md-4">
            <label for="apellido" class="form-label">Apellido</label>
            <input id="apellido" type="text" name="apellido" class="form-control @error('apellido') is-invalid @enderror"
                   value="{{ old('apellido', $empleado->apellido) }}" required>
            @error('apellido') <div class="invalid-feedback">{{ $message }}</div> @enderror
        </div>

        <div class="col-md-4">
            <label for="correo" class="form-label">Correo (opcional)</label>
            <input id="correo" type="email" name="correo" class="form-control @error('correo') is-invalid @enderror"
                   value="{{ old('correo', $empleado->correo) }}">
            @error('correo') <div class="invalid-feedback">{{ $message }}</div> @enderror
        </div>

        <div class="col-md-4">
            <label for="cargo" class="form-label">Cargo</label>
            <select id="cargo" name="cargo" class="form-select @error('cargo') is-invalid @enderror" required>
                <option value="">Selecciona un cargo</option>
                @foreach (\App\Models\Empleado::CARGOS as $c)
                    <option value="{{ $c }}" @selected(old('cargo', $empleado->cargo) === $c)>{{ $c }}</option>
                @endforeach
            </select>
            @error('cargo') <div class="invalid-feedback">{{ $message }}</div> @enderror
        </div>

        <div class="col-md-4">
            <label for="salario" class="form-label">Salario mensual (L.)</label>
            <input id="salario" type="number" step="0.01" min="0.01" name="salario"
                   class="form-control @error('salario') is-invalid @enderror"
                   value="{{ old('salario', $empleado->salario) }}" required>
            @error('salario') <div class="invalid-feedback">{{ $message }}</div> @enderror
        </div>

        <div class="col-md-4">
            <label for="fecha_ingreso" class="form-label">Fecha de ingreso</label>
            <input id="fecha_ingreso" type="date" name="fecha_ingreso"
                   class="form-control @error('fecha_ingreso') is-invalid @enderror"
                   value="{{ old('fecha_ingreso', optional($empleado->fecha_ingreso)->format('Y-m-d')) }}" required>
            @error('fecha_ingreso') <div class="invalid-feedback">{{ $message }}</div> @enderror
        </div>

        <div class="col-md-4">
            <label for="estado" class="form-label">Estado</label>
            <select id="estado" name="estado" class="form-select @error('estado') is-invalid @enderror" required>
                @foreach (\App\Models\Empleado::ESTADOS as $est)
                    <option value="{{ $est }}" @selected(old('estado', $empleado->estado ?? 'Activo') === $est)>{{ $est }}</option>
                @endforeach
            </select>
            @error('estado') <div class="invalid-feedback">{{ $message }}</div> @enderror
        </div>

    </div>

    <div class="d-flex justify-content-end gap-2 mt-4">
        <a href="{{ route('empleados.index') }}" class="btn btn-outline-secondary">Cancelar</a>
        <button type="submit" class="btn btn-primary">{{ $boton }}</button>
    </div>
</form>