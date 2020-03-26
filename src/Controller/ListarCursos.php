<?php

namespace Alura\Cursos\Controller;

use Alura\Cursos\Infra\EntityManagerCreator;

class ListarCursos implements InterfaceControladorRequisicao
{

    private $repositorioDeCursos;

    public function __construct(){
        $entityManager = (new \Alura\Cursos\Infra\EntityManagerCreator())->getEntityManager();
        $this->repositorioDeCursos = $entityManager->getRepository(\Alura\Cursos\Entity\Curso::class);
    }

    public function processaRequisicao(): void{
        
        $cursos = $this->repositorioDeCursos->findAll();
        $titulo= 'Lista de Cursos';
        require __DIR__ . '/../../view/cursos/listar-curso.php'; //esse require faz com que todas as variaveis q existem na função acima existam nesse arquivo
        //diferença entre include e require : include da erro e continua, require n encontra e para execeção
    }
}