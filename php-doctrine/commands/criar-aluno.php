<?php

use Alura\Doctrine\Entity\Aluno;
use Alura\Doctrine\Helper\EntityManagerFactory;

require_once __DIR__ .  '/../vendor/autoload.php';

$aluno = new Aluno();
$aluno->setNome('Vinícius Dias');

$entityManagerFactory = new EntityManagerFactory();
$entitiManager = $entityManagerFactory->getEntityManager();

$entitiManager->persist($aluno);
$aluno->setNome('Vinicius Dias');

$entitiManager->flush();