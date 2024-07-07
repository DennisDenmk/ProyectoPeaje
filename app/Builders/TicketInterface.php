<?php


namespace App\Builders;
use App\Models\Ticket;

interface TicketInterface
{
    public function setNombre($nombre);
    public function setHora($hora);
    public function setPlaca($placa);
    public function setCosto($costo);
    public function setUbicacion($ubicacion);
}