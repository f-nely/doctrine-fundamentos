<?php

use Alura\Doctrine\Entity\Aluno;
use Alura\Doctrine\Helper\EntityManagerFactory;
use Alura\Doctrine\Entity\Curso;

require_once __DIR__ .  '/../vendor/autoload.php';

$entityManagerFactory = new EntityManagerFactory();
$entitiManager = $entityManagerFactory->getEntityManager();

$idAluno = $argv[1];
$idCurso = $argv[2];

/** @var Aluno $aluno */
$aluno = $entitiManager->find(Aluno::class, $idAluno);
/** @var Curso $curso */
$curso = $entitiManager->find(Curso::class, $idCurso);

$curso->addAluno($aluno);

$entitiManager->flush();
//$aluno->addCurso($curso);