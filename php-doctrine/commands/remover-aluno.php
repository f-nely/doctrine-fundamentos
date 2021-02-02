<?php

use Alura\Doctrine\Entity\Aluno;
use Alura\Doctrine\Helper\EntityManagerFactory;

require_once __DIR__ .  '/../vendor/autoload.php';


$entityManagerFactory = new EntityManagerFactory();
$entitiManager = $entityManagerFactory->getEntityManager();

$id = $argv[1];
$aluno = $entitiManager->getReference(Aluno::class, $id);

$entitiManager->remove($aluno);
$entitiManager->flush();