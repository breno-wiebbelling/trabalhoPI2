<?php

function verificarPessoa($nomeDoUsuario, $senhaDoUsuario){
	$pdo = require('conectarBanco.php');

	$listaDePessoas = $pdo->query("select * from tb_pessoa where nm_pessoa = '$nomeDoUsuario' and senha = '$senhaDoUsuario'")->fetchAll(PDO::FETCH_ASSOC);

	return sizeof($listaDePessoas)==1;
}

function getDadosPessoa($nomeDaPessoa,$senhaDaPessoa){
	$pdo = require('conectarBanco.php');
	$listaDeDados = $pdo->query("select nm_pessoa, id_pessoa, id_classificacao from tb_pessoa where nm_pessoa = '$nomeDaPessoa' and senha = '$senhaDaPessoa'")->fetchAll(PDO::FETCH_ASSOC);

	foreach($listaDeDados as $dado){
		$dadosPessoa =  array(
			"nm_pessoa" => $dado['nm_pessoa'],
			"id_pessoa" => $dado['id_pessoa'],
			"id_classificacao" => $dado['id_classificacao'],
		);
	}

	return $dadosPessoa;
}

function inserirPessoa($nomeDaPessoa,$senhaDaPessoa){

	$pdo = require('conectarBanco.php');
	$pdo->query("insert into tb_pessoa values (nextval('sq_id_pessoa') , '$nomeDaPessoa', '$senhaDaPessoa')");

}

function listarPessoas(){
	$pdo = require('conectarBanco.php');
	$listaDePessoas = $pdo->query("select id_pessoa,nm_pessoa, id_classificacao from tb_pessoa")->fetchAll(PDO::FETCH_ASSOC);

	return $listaDePessoas;
}

function listarPessoaComId($idPessoa){
	$pdo = require('conectarBanco.php');
	$listaDeDados = $pdo->query("select nm_pessoa, id_pessoa, id_classificacao from tb_pessoa where id_pessoa = $idPessoa")->fetchAll(PDO::FETCH_ASSOC);

	foreach($listaDeDados as $dado){
		$dadosPessoa =  array(
			"nm_pessoa" => $dado['nm_pessoa'],
			"id_pessoa" => $dado['id_pessoa'],
			"id_classificacao" => $dado['id_classificacao'],
		);
	}

	return $dadosPessoa;
}

function alterarNome($idPessoa, $novoNome){
	$pdo = require('conectarBanco.php');
	$pdo->query("update tb_pessoa set nm_pessoa = '$novoNome' where id_pessoa = $idPessoa")->fetchAll(PDO::FETCH_ASSOC);

}

function deletarPessoa($idPessoa){
	$pdo = require('conectarBanco.php');
	$pdo->query("delete from tb_pessoa where id_pessoa = $idPessoa")->fetchAll(PDO::FETCH_ASSOC);

}

?>