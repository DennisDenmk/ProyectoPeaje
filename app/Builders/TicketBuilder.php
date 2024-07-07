<?php

namespace App\Builders;
use App\Models\Ticket;

class TicketBuilder implements TicketInterface
{
    protected $ticket;

    public function __construct() {
        $this->ticket = new Ticket();
    }

    public function setNombre($nombre) {
        $this->ticket->nombre = $nombre;
        return $this;
    }
    
    public function setHora($hora){
        $this->ticket->hora=$hora;
        return $this;
    }
    
    public function setPlaca($placa){
        $this->ticket->placa=$placa;
        return $this;
    }
    
    public function setCosto($costo){
        $this->ticket->costo=$costo;
        return $this;
    }
    
    public function setUbicacion($ubicacion){
        $this->ticket->ubicacion=$ubicacion;
        return $this;
    }
    public function build(){
        return $this->ticket;
    }

}