<?php

use Alura\Doctrine\Entity\Aluno;
use Alura\Doctrine\Entity\Telefone;
use Alura\Doctrine\Helper\EntityManagerFactory;

require_once __DIR__ . '/../vendor/autoload.php';

$entityManagerFactory = new EntityManagerFactory();
$entitiManager = $entityManagerFactory->getEntityManager();

$alunoRepository = $entitiManager->getRepository(Aluno::class);

/** @var Aluno[] $alunoList */
$alunoList = $alunoRepository->findAll();

foreach ($alunoList as $aluno) {
    $telefones = $aluno
        ->getTelefones()
        ->map(function (Telefone $telefone){
            return $telefone->getNumero();
        })
        ->toArray();

    echo "ID: {$aluno->getId()}\nNome: {$aluno->getNome()}\n\n";
    echo "Telefones: " . implode(',', $telefones);

    echo "\n\n";
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