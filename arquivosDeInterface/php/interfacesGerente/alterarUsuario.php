<?php

require_once('../../../db/funcoesDeBanco.php');
require_once("../../../php/getPaginas.php");

$idParaAlterar = $_POST['id_alterar'];

$dadosDaPessoa = listarPessoaComId($idParaAlterar);

echo getAlterarUsuario($dadosDaPessoa);

?>