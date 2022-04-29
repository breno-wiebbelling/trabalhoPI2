<?php

require_once('../db/funcoesDeBanco.php');
require_once('../php/getPaginas.php');

alterarNome($_POST['idPessoa'],$_POST['nm_pessoa']);

echo('<script>window.location.replace("../arquivosDeInterface/php/interfacesFuncionario/mostrarPessoas.php");</script>');

?>