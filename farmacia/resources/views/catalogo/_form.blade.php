<form action="{{ $action }}" method="POST" enctype="multipart/form-data">
    @csrf
    @if ($metodo !== 'POST')
        @method($metodo)
    @endif

    <div class="row g-3">

        <div class="col-md-4">
            <label for="codigo" class="form-label">Código SKU</label>
            <input id="codigo" type="text" name="codigo" class="form-control @error('codigo') is-invalid @enderror"
                   value="{{ old('codigo', $medicamento->codigo) }}" required>
            @error('codigo') <div class="invalid-feedback">{{ $message }}</div> @enderror
        </div>

        <div class="col-md-8">
            <label for="nombre" class="form-label">Nombre</label>
            <input id="nombre" type="text" name="nombre" class="form-control @error('nombre') is-invalid @enderror"
                   value="{{ old('nombre', $medicamento->nombre) }}" required>
            @error('nombre') <div class="invalid-feedback">{{ $message }}</div> @enderror
        </div>

        <div class="col-md-4">
            <label for="categoria" class="form-label">Categoría</label>
            <select id="categoria" name="categoria" class="form-select @error('categoria') is-invalid @enderror" required>
                <option value="">Selecciona una categoría</option>
                @foreach (\App\Models\Medicamento::CATEGORIAS as $cat)
                    <option value="{{ $cat }}" @selected(old('categoria', $medicamento->categoria) === $cat)>{{ $cat }}</option>
                @endforeach
            </select>
            @error('categoria') <div class="invalid-feedback">{{ $message }}</div> @enderror
        </div>

        <div class="col-md-4">
            <label for="laboratorio" class="form-label">Laboratorio</label>
            <input id="laboratorio" type="text" name="laboratorio" class="form-control @error('laboratorio') is-invalid @enderror"
                   value="{{ old('laboratorio', $medicamento->laboratorio) }}" required>
            @error('laboratorio') <div class="invalid-feedback">{{ $message }}</div> @enderror
        </div>

        <div class="col-md-4">
            <label for="numero_lote" class="form-label">Número de lote</label>
            <input id="numero_lote" type="text" name="numero_lote" class="form-control @error('numero_lote') is-invalid @enderror"
                   value="{{ old('numero_lote', $medicamento->numero_lote) }}" required>
            @error('numero_lote') <div class="invalid-feedback">{{ $message }}</div> @enderror
        </div>

        <div class="col-md-3">
            <label for="precio" class="form-label">Precio (L.)</label>
            <input id="precio" type="number" step="0.01" min="0.01" name="precio" class="form-control @error('precio') is-invalid @enderror"
                   value="{{ old('precio', $medicamento->precio) }}" required>
            @error('precio') <div class="invalid-feedback">{{ $message }}</div> @enderror
        </div>

        <div class="col-md-3">
            <label for="costo" class="form-label">Costo (L.)</label>
            <input id="costo" type="number" step="0.01" min="0" name="costo" class="form-control @error('costo') is-invalid @enderror"
                   value="{{ old('costo', $medicamento->costo) }}" required>
            @error('costo') <div class="invalid-feedback">{{ $message }}</div> @enderror
        </div>

        <div class="col-md-3">
            <label for="inventario" class="form-label">Inventario</label>
            <input id="inventario" type="number" step="1" min="0" name="inventario" class="form-control @error('inventario') is-invalid @enderror"
                   value="{{ old('inventario', $medicamento->inventario ?? 0) }}" required>
            @error('inventario') <div class="invalid-feedback">{{ $message }}</div> @enderror
        </div>

        <div class="col-md-3">
            <label for="fecha_vencimiento" class="form-label">Fecha de vencimiento</label>
            <input id="fecha_vencimiento" type="date" name="fecha_vencimiento" class="form-control @error('fecha_vencimiento') is-invalid @enderror"
                   value="{{ old('fecha_vencimiento', optional($medicamento->fecha_vencimiento)->format('Y-m-d')) }}" required>
            @error('fecha_vencimiento') <div class="invalid-feedback">{{ $message }}</div> @enderror
        </div>

        <div class="col-12">
            <label for="imagen" class="form-label">Fotografía del empaque</label>
            @if ($medicamento->imagen)
                <div class="mb-2">
                    <img src="{{ asset('uploads/medicamentos/' . $medicamento->imagen) }}" alt="Imagen actual" class="img-thumbnail" style="width: 90px; height: 90px; object-fit: cover;">
                </div>
            @endif
            <input id="imagen" type="file" name="imagen" accept=".jpg,.jpeg,.png,.webp"
                   class="form-control @error('imagen') is-invalid @enderror">
            <div class="form-text">JPG, PNG o WEBP, máximo 5 MB.</div>
            @error('imagen') <div class="invalid-feedback d-block">{{ $message }}</div> @enderror
        </div>

    </div>

    <div class="d-flex justify-content-end gap-2 mt-4">
        <a href="{{ route('catalogo.index') }}" class="btn btn-outline-secondary">Cancelar</a>
        <button type="submit" class="btn btn-primary">{{ $boton }}</button>
    </div>
</form>