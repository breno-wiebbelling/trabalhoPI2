<?php

require_once('../db/funcoesDeBanco.php');
require_once("./getPaginas.php");


$nomeDaPessoa = $_POST['nomeDaPessoa'];
$senhaDaPessoa = $_POST['senhaDaPessoa'];

if(verificarPessoa($nomeDaPessoa, $senhaDaPessoa)){
    echo("<script>window.alert('Pessoa já existe');</script>");
    echo("<script>window.location.replace('../index.php');</script>");
}else{
    inserirPessoa($nomeDaPessoa, $senhaDaPessoa);
    $dadosPessoa = getDadosPessoa($nomeDaPessoa, $senhaDaPessoa);
    echo(getInterfacePessoa($dadosPessoa));}
?>