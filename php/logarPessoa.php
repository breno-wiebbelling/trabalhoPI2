<?php

require_once('../db/funcoesDeBanco.php');
require_once("./getPaginas.php");

$nomeDoUsuario = $_POST['nomeDoUsuario'];
$senhaDoUsuario = $_POST['senhaDoUsuario'];

if(verificarPessoa($nomeDoUsuario, $senhaDoUsuario)){
    $dadosPessoa = getDadosPessoa($nomeDoUsuario, $senhaDoUsuario);

    session_start();
    $_SESSION['id_pessoa'] = $dadosPessoa['id_pessoa'];

    echo(getInterfacePessoa($dadosPessoa));

}else{
    echo("<script>window.alert('Usuário não encontrado');</script>");
    echo("<script>window.location.replace('../index.php');</script>");
}

?>