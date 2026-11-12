<?php

namespace App\Http\Controllers;

class DashboardController extends Controller
{
    public function index()
    {
        return view('layouts.dashboard', [
            'totalMedicamentos' => 0,
            'proveedoresActivos' => 0,
            'totalEmpleados' => 0,
            'valorInventario' => 0,
        ]);
    }
}
