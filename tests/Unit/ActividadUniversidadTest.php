<?php

use App\Models\Curso;
use App\Models\Docente;
use App\Models\Estudiante;
use App\Models\Grupo;
use App\Models\Matricula;


test('un grupo puede tener dos estudiantes matriculados', function () {
    $curso = new Curso(
        'IF6100',
        'Análisis y Diseño de Sistemas'
    );

    $docente = new Docente('María Rodríguez');

    $grupo = new Grupo($curso, $docente, 1, 30);

    $estudiante1 = new Estudiante('Ana Mora');
    $estudiante2 = new Estudiante('Carlos Pérez');

    $matricula1 = new Matricula(
        $estudiante1,
        $grupo,
        new DateTimeImmutable('2026-10-14')
    );

    $matricula2 = new Matricula(
        $estudiante2,
        $grupo,
        new DateTimeImmutable('2026-10-14')
    );

    $grupo->matricular($matricula1);
    $grupo->matricular($matricula2);

    expect($grupo->matriculas())
        ->toHaveCount(2)
        ->and($grupo->matriculas()[0]->estudiante()->nombre())
        ->toBe('Ana Mora')
        ->and($grupo->matriculas()[1]->estudiante()->nombre())
        ->toBe('Carlos Pérez');
});
