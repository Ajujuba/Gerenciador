<?php

if($_SERVER['PATH_INFO'] === '/listar-cursos'){
    require 'listar-cursos.php';

}elseif($_SERVER['PATH_INFO'] === '/novo-curso'){
    require 'formulario-novo-curso.php';
}else{
    echo "Erro 404 - página não encontrada";
}

?>