<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Finanza extends Model
{
    use HasFactory;

    protected $primaryKey = 'id_finanzas';
    protected $table = 'finanzas';

    protected $fillable = [
        'id_peaje',
        'saldo',
        'id_empleado',
        'fecha',
        'tipo_Vehiculo',
        'tipo_pago'
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