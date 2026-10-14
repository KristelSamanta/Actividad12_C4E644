<?php

namespace App\Models;

class Curso
{
    public function __construct(
        private string $codigo,
        private string $nombre
    ) {
    }

    public function codigo(): string
    {
        return $this->codigo;
    }

    public function nombre(): string
    {
        return $this->nombre;
    }
}
