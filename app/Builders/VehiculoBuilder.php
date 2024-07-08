<?php

namespace App\Builders;

use App\Models\Vehiculo;

class VehiculoBuilder implements VehiculoInterface
{
    protected $vehiculo;

    public function __construct()
    {
        $this->vehiculo = new Vehiculo();
    }

    public function setIdVehiculo($idVehiculo)
    {
        $this->vehiculo->id_vehiculo = $idVehiculo;
        return $this;
    }

    public function setPlaca($placa)
    {
        $this->vehiculo->placa = $placa;
        return $this;
    }

    public function setTipoVehiculo($tipo_vehiculo)
    {
        $this->vehiculo->tipo_vehiculo = $tipo_vehiculo;
        return $this;
    }

    public function setAnio($anio)
    {
        $this->vehiculo->anio = $anio;
        return $this;
    }

    public function setIdCliente($id_cliente)
    {
        $this->vehiculo->id_cliente = $id_cliente;
        return $this;
    }

    public function build()
    {
        return $this->vehiculo;
    }
}
