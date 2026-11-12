<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Medicamento extends Model
{
    public const CATEGORIAS = ['Antibióticos', 'Analgésicos', 'Sueros', 'Material Quirúrgico', 'Vitaminas'];

    protected $fillable = [
        'codigo', 'nombre', 'categoria', 'precio', 'costo', 'inventario',
        'imagen', 'laboratorio', 'fecha_vencimiento', 'fecha_registro', 'numero_lote',
    ];

    protected $casts = [
        'precio' => 'decimal:2',
        'costo' => 'decimal:2',
        'inventario' => 'integer',
        'fecha_vencimiento' => 'date',
        'fecha_registro' => 'date',
    ];

    public function estadoStock(): array
    {
        return match (true) {
            $this->inventario > 20 => ['clase' => 'bg-success', 'texto' => 'Óptimo'],
            $this->inventario >= 10 => ['clase' => 'bg-warning text-dark', 'texto' => 'Moderado'],
            default => ['clase' => 'bg-danger', 'texto' => '¡Desabastecimiento!'],
        };
    }
}
