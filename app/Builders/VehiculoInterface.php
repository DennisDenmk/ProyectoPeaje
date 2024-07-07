<?php
namespace App\Buiders;
use App\Models\Vehiculo;

interface VehiculoInterface{

    public function setIdVehiculo($idVehiculo);
    public function setPlaca($placa);
    public function setMatricula($matricula);
    public function setTipoVehiculo($tipo_vehiculo);
    public function setColor($color);
    public function setIdCliente($id_cliente);
    
}
