<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Cliente extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $primaryKey = 'id_cliente';

    protected $fillable = [
        'nombre',
        'cedula',
        'contrasenia',
        'correo',
        'telefono',
        'saldo',
    ];

    protected $hidden = [
        'contrasenia',
    ];

    public function getAuthIdentifierName()
    {
        return 'cedula';
    }
    public function getAuthPassword()
    {
        return $this->contrasenia;
    }
    
    public function vehiculos()
    {
        return $this->hasMany(Vehiculo::class, 'id_cliente');
    }
}
