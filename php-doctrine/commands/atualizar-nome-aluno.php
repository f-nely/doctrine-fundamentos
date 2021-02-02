<?php

use Alura\Doctrine\Entity\Aluno;
use Alura\Doctrine\Helper\EntityManagerFactory;

require_once __DIR__ .  '/../vendor/autoload.php';


$entityManagerFactory = new EntityManagerFactory();
$entitiManager = $entityManagerFactory->getEntityManager();

$id = $argv[1];
$novoNome = $argv[2];

$aluno = $entitiManager->find(Aluno::class, $id);
$aluno->setNome($novoNome);

$entitiManager->flush();

