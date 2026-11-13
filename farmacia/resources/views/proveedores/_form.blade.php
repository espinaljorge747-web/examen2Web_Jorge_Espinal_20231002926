<form action="{{ $action }}" method="POST">
    @csrf
    @if ($metodo !== 'POST')
        @method($metodo)
    @endif

    <div class="row g-3">

        <div class="col-md-4">
            <label for="rtn" class="form-label">RTN (14 dígitos)</label>
            <input id="rtn" type="text" name="rtn" inputmode="numeric" maxlength="14"
                   class="form-control @error('rtn') is-invalid @enderror"
                   value="{{ old('rtn', $proveedor->rtn) }}" required>
            @error('rtn') <div class="invalid-feedback">{{ $message }}</div> @enderror
        </div>

        <div class="col-md-8">
            <label for="empresa" class="form-label">Razón social</label>
            <input id="empresa" type="text" name="empresa" class="form-control @error('empresa') is-invalid @enderror"
                   value="{{ old('empresa', $proveedor->empresa) }}" required>
            @error('empresa') <div class="invalid-feedback">{{ $message }}</div> @enderror
        </div>

        <div class="col-md-6">
            <label for="contacto" class="form-label">Asesor comercial</label>
            <input id="contacto" type="text" name="contacto" class="form-control @error('contacto') is-invalid @enderror"
                   value="{{ old('contacto', $proveedor->contacto) }}" required>
            @error('contacto') <div class="invalid-feedback">{{ $message }}</div> @enderror
        </div>

        <div class="col-md-3">
            <label for="telefono" class="form-label">Teléfono (8 dígitos)</label>
            <input id="telefono" type="text" name="telefono" inputmode="numeric" maxlength="8"
                   class="form-control @error('telefono') is-invalid @enderror"
                   value="{{ old('telefono', $proveedor->telefono) }}" required>
            @error('telefono') <div class="invalid-feedback">{{ $message }}</div> @enderror
        </div>

        <div class="col-md-3">
            <label for="categoria" class="form-label">Categoría</label>
            <select id="categoria" name="categoria" class="form-select @error('categoria') is-invalid @enderror" required>
                <option value="">Selecciona una categoría</option>
                @foreach (\App\Models\Proveedor::CATEGORIAS as $cat)
                    <option value="{{ $cat }}" @selected(old('categoria', $proveedor->categoria) === $cat)>{{ $cat }}</option>
                @endforeach
            </select>
            @error('categoria') <div class="invalid-feedback">{{ $message }}</div> @enderror
        </div>

        <div class="col-md-3">
            <label for="limite_credito" class="form-label">Límite de crédito (L.)</label>
            <input id="limite_credito" type="number" step="0.01" min="0" name="limite_credito"
                   class="form-control @error('limite_credito') is-invalid @enderror"
                   value="{{ old('limite_credito', $proveedor->limite_credito) }}" required>
            @error('limite_credito') <div class="invalid-feedback">{{ $message }}</div> @enderror
        </div>

        <div class="col-md-3">
            <label for="dias_credito" class="form-label">Días de crédito</label>
            <select id="dias_credito" name="dias_credito" class="form-select @error('dias_credito') is-invalid @enderror" required>
                <option value="">Selecciona un plazo</option>
                @foreach (\App\Models\Proveedor::DIAS_CREDITO as $dias)
                    <option value="{{ $dias }}" @selected(old('dias_credito', $proveedor->dias_credito) == $dias)>{{ $dias }} días</option>
                @endforeach
            </select>
            @error('dias_credito') <div class="invalid-feedback">{{ $message }}</div> @enderror
        </div>

        <div class="col-md-3">
            <label for="estado" class="form-label">Estado</label>
            <select id="estado" name="estado" class="form-select @error('estado') is-invalid @enderror" required>
                @foreach (\App\Models\Proveedor::ESTADOS as $est)
                    <option value="{{ $est }}" @selected(old('estado', $proveedor->estado ?? 'Activo') === $est)>{{ $est }}</option>
                @endforeach
            </select>
            @error('estado') <div class="invalid-feedback">{{ $message }}</div> @enderror
        </div>

    </div>

    <div class="d-flex justify-content-end gap-2 mt-4">
        <a href="{{ route('proveedores.index') }}" class="btn btn-outline-secondary">Cancelar</a>
        <button type="submit" class="btn btn-primary">{{ $boton }}</button>
    </div>
</form>