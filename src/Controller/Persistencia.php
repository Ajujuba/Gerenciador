<?php


namespace Alura\Cursos\Controller;
use Alura\Cursos\Entity\Curso;
use Alura\Cursos\Infra\EntityManagerCreator;

class Persistencia implements InterfaceControladorRequisicao
{
 
    private $entityManager;

    public function __construct()
    {
        $this->entityManager = (new EntityManagerCreator())->getEntityManager();
    }

    public function processaRequisicao(): void
    {
        $descricao = filter_input(
            INPUT_POST, //tipo
            'descricao', //nome variavel 
            FILTER_SANITIZE_STRING //filtro usado
        ); 

        $curso = new Curso();
        $curso->setDescricao($_POST['descricao']);
    
        $this->entityManager->persist($curso); //salvo
        $this->entityManager->flush(); // mando banco

        header('Location: /listar-cursos', false, 302); //302 é de redirecionamento
    }
}