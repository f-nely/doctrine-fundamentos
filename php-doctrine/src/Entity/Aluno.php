<?php


namespace Alura\Doctrine\Entity;


use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\ORM\Mapping\Column;
use Doctrine\ORM\Mapping\Entity;
use Doctrine\ORM\Mapping\GeneratedValue;
use Doctrine\ORM\Mapping\Id;
use Doctrine\ORM\Mapping\ManyToMany;
use Doctrine\ORM\Mapping\OneToMany;

/**
 * @Entity
 */
class Aluno
{
    /**
     * @Id
     * @Column(type="integer")
     * @GeneratedValue
     */
    private int $id;

    /**
     * @Column(type="string")
     */
    private string $nome;

    /**
     * @OneToMany(targetEntity="Telefone", mappedBy="aluno", cascade={"remove", "persist"})
     */
    private $telefones;

    /**
     * @ManyToMany(targetEntity="Curso", mappedBy="alunos")
     */
    private $cursos;

    public function __construct()
    {
        $this->telefones = new ArrayCollection();
        $this->cursos = new ArrayCollection();
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function getNome(): string
    {
        return $this->nome;
    }

    public function setNome(string $nome): self
    {
        $this->nome = $nome;
        return $this;
    }

    public function addTelefone(Telefone $telefone)
    {
        $this->telefones->add($telefone);
        $telefone->setAluno($this);

        return $this;
    }

    public function getTelefones(): Collection
    {
        return $this->telefones;
    }

    public function addCurso(Curso $curso)
    {
        if ($this->cursos->contains($curso)) {
            return $this;
        }

        $this->cursos->add($curso);
        $curso->addAluno($this);

        return $this;
    }

    public function getCursos(): Collection
    {
        return $this->cursos;
    }
}