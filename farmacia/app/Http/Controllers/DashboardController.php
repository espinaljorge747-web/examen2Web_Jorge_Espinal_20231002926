<?php

namespace App\Http\Controllers;

use App\Models\Empleado;
use App\Models\Medicamento;
use App\Models\Proveedor;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index()
    {
        return view('dashboard', [
            'totalMedicamentos' => Medicamento::count(),
            'proveedoresActivos' => Proveedor::where('estado', 'Activo')->count(),
            'totalEmpleados' => Empleado::where('estado', 'Activo')->count(),
            'valorInventario' => Medicamento::query()
                ->selectRaw('COALESCE(SUM(inventario * precio), 0) AS total')
                ->value('total'),
        ]);
    }
}