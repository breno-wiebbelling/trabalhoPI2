<?php

require_once("../db/funcoesDeBanco.php");

deletarPessoa($_POST['id_exclusao']);
echo('<script>window.location.replace("../arquivosDeInterface/php/interfacesFuncionario/mostrarPessoas.php");</script>');

?>