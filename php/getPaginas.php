<?php

function getLogin(){
    return file_get_contents("./arquivosDeInterface/html/login/index.html");
}

function getCadastro(){
    return file_get_contents("../../arquivosDeInterface/html/cadastro/index.html");
}

function getInterfacePessoa($dadosDoUsuario){

    if($dadosDoUsuario["id_classificacao"]==1){
        $templatePessoa = file_get_contents("../arquivosDeInterface/html/pessoa/usuario.html");
    }else if($dadosDoUsuario["id_classificacao"]==2){
        $templatePessoa = file_get_contents("../arquivosDeInterface/html/pessoa/funcionario.html");
    }else{
        $templatePessoa = file_get_contents("../arquivosDeInterface/html/pessoa/gerente.html");
    }

    $templatePessoa = str_replace("nm_pessoa",$dadosDoUsuario["nm_pessoa"],$templatePessoa);
    $templatePessoa = str_replace("id_pessoa",$dadosDoUsuario["id_pessoa"],$templatePessoa);
    $templatePessoa = str_replace("id_classificacao",$dadosDoUsuario["id_classificacao"],$templatePessoa);

    return $templatePessoa;
}

function getInterfaceListarPessoas($listaDePessoas){
    
    $interface = file_get_contents('../../html/listarPessoas/funcionario/index.html');
    $moldePessoa = file_get_contents('../../html/listarPessoas/pessoa.html');
    
    $pessoas="";
    
    foreach($listaDePessoas as $pessoa){
        $moldeDestaPessoa = $moldePessoa;
    
        $moldeDestaPessoa = str_replace("id_pessoa",$pessoa['id_pessoa'],$moldeDestaPessoa);
        $moldeDestaPessoa = str_replace("nm_pessoa",$pessoa['nm_pessoa'],$moldeDestaPessoa);
        $moldeDestaPessoa = str_replace("id_classificacao",$pessoa['id_classificacao'],$moldeDestaPessoa);
        
        $pessoas.=$moldeDestaPessoa;
    
    }
    $interface = str_replace("<!--pessoas-->",$pessoas,$interface);
    
    return $interface;
}

function getAlterarUsuario($dadosDaPessoa){
    $interface = file_get_contents("../../html/interfaceFuncionario/alterarUsuario.html");
    
    $interface = str_replace('$id_pessoa',$dadosDaPessoa['id_pessoa'],$interface);
    $interface = str_replace('$nm_pessoa',$dadosDaPessoa['nm_pessoa'],$interface);
    $interface = str_replace('$id_classificacao',$dadosDaPessoa['id_classificacao'],$interface);

    return $interface;
}

?>