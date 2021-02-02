<?php

use Alura\Doctrine\Entity\Aluno;
use Alura\Doctrine\Helper\EntityManagerFactory;

require_once __DIR__ .  '/../vendor/autoload.php';

$aluno = new Aluno();
$aluno->setNome($argv[1]);

$entityManagerFactory = new EntityManagerFactory();
$entitiManager = $entityManagerFactory->getEntityManager();

$entitiManager->persist($aluno);

$entitiManager->flush();