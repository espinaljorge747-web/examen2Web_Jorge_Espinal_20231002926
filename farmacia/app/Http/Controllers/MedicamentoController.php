<?php

namespace App\Http\Controllers;

use App\Models\Medicamento;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;

class MedicamentoController extends Controller
{
    private const CARPETA = 'uploads/medicamentos';

    public function index(Request $request)
    {
        $buscar = $request->get('buscar');

        $medicamentos = Medicamento::query()
            ->when($buscar, fn ($q) => $q->where(fn ($w) => $w
                ->where('nombre', 'like', "%{$buscar}%")
                ->orWhere('codigo', 'like', "%{$buscar}%")))
            ->orderBy('nombre')
            ->paginate(10)
            ->withQueryString();

        return view('catalogo.index', compact('medicamentos'));
    }

    public function create()
    {
        return view('catalogo.create', ['medicamento' => new Medicamento()]);
    }

    public function store(Request $request)
    {
        $data = $this->validar($request);
        $data['fecha_registro'] = now()->toDateString();

        if ($request->hasFile('imagen')) {
            $data['imagen'] = $this->guardarImagen($request->file('imagen'));
        }

        Medicamento::create($data);

        return redirect()->route('catalogo.index')
            ->with('success', 'Medicamento registrado correctamente.');
    }

    public function edit(Medicamento $medicamento)
    {
        return view('catalogo.edit', compact('medicamento'));
    }

    public function update(Request $request, Medicamento $medicamento){
    $data = $this->validar($request, $medicamento->id);
    unset($data['imagen']);

    if ($request->hasFile('imagen')) {
        $this->eliminarImagen($medicamento->imagen);
        $data['imagen'] = $this->guardarImagen($request->file('imagen'));
    }

    $medicamento->update($data);

    return redirect()->route('catalogo.index')
        ->with('success', 'Medicamento actualizado correctamente.');
    }

    public function destroy(Medicamento $medicamento)
    {
        $this->eliminarImagen($medicamento->imagen);
        $medicamento->delete();

        return redirect()->route('catalogo.index')
            ->with('success', 'Medicamento eliminado correctamente.');
    }

    private function validar(Request $request, ?int $id = null): array
    {
        return $request->validate([
            'codigo' => ['required', 'string', 'max:50', Rule::unique('medicamentos', 'codigo')->ignore($id)],
            'nombre' => ['required', 'string', 'max:255'],
            'categoria' => ['required', Rule::in(Medicamento::CATEGORIAS)],
            'precio' => ['required', 'numeric', 'gt:0'],
            'costo' => ['required', 'numeric', 'min:0'],
            'inventario' => ['required', 'integer', 'min:0'],
            'imagen' => ['nullable', 'image', 'mimes:jpg,jpeg,png,webp', 'max:5120'],
            'laboratorio' => ['required', 'string', 'max:255'],
            'fecha_vencimiento' => ['required', 'date'],
            'numero_lote' => ['required', 'string', 'max:50'],
        ]);
    }

    private function guardarImagen($archivo): string
    {
        File::ensureDirectoryExists(public_path(self::CARPETA));

        $nombre = Str::uuid() . '.' . $archivo->getClientOriginalExtension();
        $archivo->move(public_path(self::CARPETA), $nombre);

        return $nombre;
    }

    private function eliminarImagen(?string $nombre): void
    {
        if ($nombre) {
            File::delete(public_path(self::CARPETA . '/' . $nombre));
        }
    }

}