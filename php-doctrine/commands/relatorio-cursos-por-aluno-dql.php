<?php

use Alura\Doctrine\Entity\Aluno;
use Alura\Doctrine\Entity\Telefone;
use Alura\Doctrine\Helper\EntityManagerFactory;
use Doctrine\DBAL\Logging\DebugStack;

require_once __DIR__ .  '/../vendor/autoload.php';

$entityManagerFactory = new EntityManagerFactory();
$entitiManager = $entityManagerFactory->getEntityManager();
$alunosRepositorio = $entitiManager->getRepository(Aluno::class);

$debugStack = new DebugStack();
$entitiManager->getConfiguration()->setSQLLogger($debugStack);

$classeAluno = Aluno::class;
$dql = "SELECT a, t, c FROM $classeAluno a JOIN a.telefones t JOIN a.cursos c";
$query = $entitiManager->createQuery($dql);
/** @var Aluno[] $alunos */
$alunos = $query->getResult();

foreach ($alunos as $aluno) {
    $telefones = $aluno
        ->getTelefones()
        ->map(function (Telefone $telefone) {
            return $telefone->getNumero();
        })
        ->toArray();

    echo "ID: {$aluno->getId()}\n";
    echo "Nome: {$aluno->getNome()}\n";
    echo "Telefones: " . implode(", ", $telefones) . "\n";
    $cursos = $aluno->getCursos();

    foreach ($cursos as $curso) {
        echo "\tID Curso: {$curso->getId()}\n";
        echo "\tCurso: {$curso->getNome()}\n";
        echo "\n";
    }
    echo "\n";
}

