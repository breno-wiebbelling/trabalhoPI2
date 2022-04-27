<?php


/*
$sql = "delete from tb_usuario where id_usuario = 1";

$pdo->query($sql);


$listaDeResultado = $pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);

foreach ($listaDeResultado as $resultado) {
	echo $resultado['nm_usuario'] . '<br>';
}
*/

function verificarPessoa($nomeDoUsuario, $senhaDoUsuario){
	$pdo = require('conectarBanco.php');

	$listaDePessoas = $pdo->query("select * from tb_pessoa where nm_pessoa = '$nomeDoUsuario' and senha = '$senhaDoUsuario'")->fetchAll(PDO::FETCH_ASSOC);

	return sizeof($listaDePessoas)==1;
}



?>