<?php

namespace App\Http\Controllers;

use App\Models\Proveedor;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class ProveedorController extends Controller
{
    public function index(Request $request)
    {
        $buscar = $request->get('buscar');

        $proveedores = Proveedor::query()
            ->when($buscar, fn ($q) => $q->where(fn ($w) => $w
                ->where('empresa', 'like', "%{$buscar}%")
                ->orWhere('rtn', 'like', "%{$buscar}%")))
            ->orderBy('empresa')
            ->paginate(10)
            ->withQueryString();

        return view('proveedores.index', compact('proveedores'));
    }

    public function create()
    {
        return view('proveedores.create', ['proveedor' => new Proveedor()]);
    }

    public function store(Request $request)
    {
        $datos = $request->validate([
            'rtn' => ['required', 'digits:14', 'unique:proveedores,rtn'],
            'empresa' => ['required', 'string', 'max:255'],
            'contacto' => ['required', 'string', 'max:255'],
            'telefono' => ['required', 'digits:8', 'regex:/^[2389][0-9]{7}$/'],
            'categoria' => ['required', 'in:Fármacos,Material Quirúrgico,Equipos'],
            'limite_credito' => ['required', 'numeric', 'min:0'],
            'dias_credito' => ['required', 'in:15,30,45,60'],
            'estado' => ['required', 'in:Activo,Inactivo'],
        ]);

        $datos['fecha_registro'] = now()->toDateString();

        Proveedor::create($datos);

        return redirect()->route('proveedores.index')
            ->with('success', 'Proveedor registrado correctamente.');
    }

    public function edit(Proveedor $proveedor)
    {
        return view('proveedores.edit', compact('proveedor'));
    }

    public function update(Request $request, Proveedor $proveedor)
    {
        $datos = $request->validate([
            'rtn' => ['required', 'digits:14', Rule::unique('proveedores', 'rtn')->ignore($proveedor->id)],
            'empresa' => ['required', 'string', 'max:255'],
            'contacto' => ['required', 'string', 'max:255'],
            'telefono' => ['required', 'digits:8', 'regex:/^[2389][0-9]{7}$/'],
            'categoria' => ['required', 'in:Fármacos,Material Quirúrgico,Equipos'],
            'limite_credito' => ['required', 'numeric', 'min:0'],
            'dias_credito' => ['required', 'in:15,30,45,60'],
            'estado' => ['required', 'in:Activo,Inactivo'],
        ]);

        $proveedor->update($datos);

        return redirect()->route('proveedores.index')
            ->with('success', 'Proveedor actualizado correctamente.');
    }

    public function destroy(Proveedor $proveedor)
    {
        $proveedor->delete();

        return redirect()->route('proveedores.index')
            ->with('success', 'Proveedor eliminado correctamente.');
    }
    
}