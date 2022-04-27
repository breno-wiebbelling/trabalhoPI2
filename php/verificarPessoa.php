<?php

require_once('../db/funcoesDeConsulta.php');

$nomeDoUsuario = $_POST['nomeDoUsuario'];
$senhaDoUsuario = $_POST['senhaDoUsuario'];

$existeUsuario = verificarPessoa($nomeDoUsuario,$senhaDoUsuario);

if ($existeUsuario){
    echo(' verificar tipo de pessoa');
}else{
    echo('<script>window.alert("Usuario não encontrado");</script>');
}

?>
