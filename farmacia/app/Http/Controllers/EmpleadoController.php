<?php

namespace App\Http\Controllers;

use App\Models\Empleado;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class EmpleadoController extends Controller
{
    public function index(Request $request)
    {
        $buscar = $request->get('buscar');

        $empleados = Empleado::query()
            ->when($buscar, fn ($q) => $q->where(fn ($w) => $w
                ->where('nombre', 'like', "%{$buscar}%")
                ->orWhere('apellido', 'like', "%{$buscar}%")
                ->orWhere('identidad', 'like', "%{$buscar}%")))
            ->orderBy('nombre')
            ->paginate(10)
            ->withQueryString();

        return view('empleados.index', compact('empleados'));
    }

    public function create()
    {
        return view('empleados.create', ['empleado' => new Empleado()]);
    }

    public function store(Request $request)
    {
        $datos = $request->validate([
            'identidad' => ['required', 'digits:13', 'unique:empleados,identidad'],
            'nombre' => ['required', 'string', 'max:255'],
            'apellido' => ['required', 'string', 'max:255'],
            'correo' => ['nullable', 'email', 'max:255'],
            'cargo' => ['required', 'in:Regente Farmacéutico,Asistente de Farmacia,Jefe de Bodega,Despachador,Cajero'],
            'salario' => ['required', 'numeric', 'gt:0'],
            'fecha_ingreso' => ['required', 'date'],
            'estado' => ['required', 'in:Activo,Inactivo'],
        ]);

        Empleado::create($datos);

        return redirect()->route('empleados.index')
            ->with('success', 'Empleado registrado correctamente.');
    }

    public function edit(Empleado $empleado)
    {
        return view('empleados.edit', compact('empleado'));
    }

    public function update(Request $request, Empleado $empleado)
    {
        $datos = $request->validate([
            'identidad' => ['required', 'digits:13', Rule::unique('empleados', 'identidad')->ignore($empleado->id)],
            'nombre' => ['required', 'string', 'max:255'],
            'apellido' => ['required', 'string', 'max:255'],
            'correo' => ['nullable', 'email', 'max:255'],
            'cargo' => ['required', 'in:Regente Farmacéutico,Asistente de Farmacia,Jefe de Bodega,Despachador,Cajero'],
            'salario' => ['required', 'numeric', 'gt:0'],
            'fecha_ingreso' => ['required', 'date'],
            'estado' => ['required', 'in:Activo,Inactivo'],
        ]);

        $empleado->update($datos);

        return redirect()->route('empleados.index')
            ->with('success', 'Empleado actualizado correctamente.');
    }

    public function destroy(Empleado $empleado)
    {
        $empleado->delete();

        return redirect()->route('empleados.index')
            ->with('success', 'Empleado eliminado correctamente.');
    }
}