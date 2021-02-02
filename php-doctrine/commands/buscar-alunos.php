<?php

use Alura\Doctrine\Entity\Aluno;
use Alura\Doctrine\Helper\EntityManagerFactory;

require_once __DIR__ . '/../vendor/autoload.php';

$entityManagerFactory = new EntityManagerFactory();
$entitiManager = $entityManagerFactory->getEntityManager();

$alunoRepository = $entitiManager->getRepository(Aluno::class);

/** @var Aluno[] $alunoList */
$alunoList = $alunoRepository->findAll();

foreach ($alunoList as $aluno) {
    echo "ID: {$aluno->getId()}\n Nome: {$aluno->getNome()}\n\n";
}

/*$nikita = $alunoRepository->find(2);
echo $nikita->getNome();*/

/*$nikita = $alunoRepository->findBy([
    "nome" => "Nikita Popov"
]);
var_dump($nikita);*/

/*$eltonMinetto = $alunoRepository->findOneBy([
   'nome' => 'Elton Minetto'
]);

var_dump($eltonMinetto);*/