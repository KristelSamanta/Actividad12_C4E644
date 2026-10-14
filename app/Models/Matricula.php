<?php

namespace App\Models;

use DateTimeImmutable;

class Matricula
{
    public function __construct(
        private Estudiante $estudiante,
        private Grupo $grupo,
        private DateTimeImmutable $fecha,
        private ?float $notaFinal = null
    ) {
    }

    public function estudiante(): Estudiante
    {
        return $this->estudiante;
    }

    public function grupo(): Grupo
    {
        return $this->grupo;
    }

    public function fecha(): DateTimeImmutable
    {
        return $this->fecha;
    }

    public function notaFinal(): ?float
    {
        return $this->notaFinal;
    }

    public function asignarNota(float $nota): void
    {
        if ($nota < 0 || $nota > 100) {
            throw new \InvalidArgumentException(
                'La nota debe estar entre 0 y 100.'
            );
        }

        $this->notaFinal = $nota;
    }
}
