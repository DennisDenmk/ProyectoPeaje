<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Finanza extends Model
{
    use HasFactory;

    protected $table = 'finanzas';

    protected $fillable = [
        'id_peaje',
        'saldo',
        'id_empleado',
        'fecha',
        'tipo_vehiculo',
    ];

    public function peaje()
    {
        return $this->belongsTo(Peaje::class, 'id_peaje');
    }

    public function empleado()
    {
        return $this->belongsTo(Empleado::class, 'id_empleado');
    }
}