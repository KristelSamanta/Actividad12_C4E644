<?php

namespace App\Models;

class Grupo
{
    /** @var Matricula[] */
    private array $matriculas = [];

    public function __construct(
        private Curso $curso,
        private Docente $docente,
        private int $numero,
        private int $cupo
    ) {
    }

    public function curso(): Curso
    {
        return $this->curso;
    }

    public function docente(): Docente
    {
        return $this->docente;
    }

    public function numero(): int
    {
        return $this->numero;
    }

    public function cupo(): int
    {
        return $this->cupo;
    }

    public function matricular(Matricula $matricula): void
    {
        if (count($this->matriculas) >= $this->cupo) {
            throw new \DomainException(
                'El grupo ya alcanzó su cupo máximo.'
            );
        }

        if ($matricula->grupo() !== $this) {
            throw new \DomainException(
                'La matrícula pertenece a otro grupo.'
            );
        }

        $this->matriculas[] = $matricula;
    }

    /** @return Matricula[] */
    public function matriculas(): array
    {
        return $this->matriculas;
    }
}
