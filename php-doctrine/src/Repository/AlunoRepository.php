<?php


namespace Alura\Doctrine\Repository;

use Alura\Doctrine\Entity\Aluno;
use Doctrine\ORM\EntityRepository;

class AlunoRepository extends EntityRepository
{
    public function buscaCursosPorAluno()
    {
        $entityManager = $this->getEntityManager();
        $classeAluno = Aluno::class;
        $dql = "SELECT a, t, c FROM $classeAluno a JOIN a.telefones t JOIN a.cursos c";
        $query = $entityManager->createQuery($dql);

        return $query->getResult();
    }
}