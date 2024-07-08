<?php

namespace App\Builders;

interface VehiculoInterface
{
    public function setIdVehiculo($idVehiculo);
    public function setPlaca($placa);
    public function setTipoVehiculo($tipo_vehiculo);
    public function setAnio($anio);
    public function setIdCliente($id_cliente);
    public function build();
}
