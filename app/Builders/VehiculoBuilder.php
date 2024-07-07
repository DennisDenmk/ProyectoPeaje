<?php

namespace App\Builders;

use App\Buiders\VehiculoInterface;
use App\Models\Vehiculo;

class VehiculoBuilder implements VehiculoInterface{

    protected $vehiculo;

    public function __construct()
    {
        $this->vehiculo = new Vehiculo();
    }

    public function setIdVehiculo($idVehiculo)
    {
        $this->vehiculo->idVehiculo = $idVehiculo;
        return $this;
    }

    public function setPlaca($placa)
    {
        $this->vehiculo->placa = $placa;
        return $this;
    }

    public function setMatricula($matricula)
    {
        $this->vehiculo->matricula = $matricula;
        return $this;
    }

    public function setTipoVehiculo($tipo_vehiculo)
    {
        $this->vehiculo->tipo_vehiculo = $tipo_vehiculo;
        return $this;
    }

    public function setColor($color)
    {
        $this->vehiculo->color = $color;
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