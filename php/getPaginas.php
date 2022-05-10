<?php

function getLogin(){
    return file_get_contents("./arquivosDeInterface/html/pessoa/login/index.html");
}

function getCadastro(){
    return file_get_contents("../../arquivosDeInterface/html/pessoa/cadastro/index.html");
}

function getInterfacePessoa($dadosDoUsuario){

    if($dadosDoUsuario["id_classificacao"]==1){
        $templatePessoa = file_get_contents("../../arquivosDeInterface/html/home/usuario.html");
    }else if($dadosDoUsuario["id_classificacao"]==2){
        $templatePessoa = file_get_contents("../../arquivosDeInterface/html/home/funcionario.html");
    }else{
        $templatePessoa = file_get_contents("../../arquivosDeInterface/html/home/gerente.html");
    }

    $templatePessoa = str_replace("nm_pessoa",$dadosDoUsuario["nm_pessoa"],$templatePessoa);
    $templatePessoa = str_replace("id_pessoa",$dadosDoUsuario["id_pessoa"],$templatePessoa);
    $templatePessoa = str_replace("id_classificacao",$dadosDoUsuario["id_classificacao"],$templatePessoa);

    return $templatePessoa;
}

function getInterfaceListarPessoas($listaDePessoas){
    
    session_start();
    if($_SESSION['id_classificacao']==3){
        $interface = file_get_contents('../../html/pessoa/listarPessoas/gerente/index.html');
    }else{
        $interface = file_get_contents('../../html/pessoa/listarPessoas/funcionario/index.html');
    }

    $moldePessoa = file_get_contents('../../html/pessoa/listarPessoas/pessoa.html');
    
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

function getInterfaceSelecionarId(){
    return file_get_contents("../../../../html/gastos/listarGastos/gerente/selecionarId.html");
}

function getAlterarUsuario($dadosDaPessoa){
    $interface = file_get_contents("../../html/pessoa/interfaceFuncionario/alterarUsuario.html");
    
    $interface = str_replace('$id_pessoa',$dadosDaPessoa['id_pessoa'],$interface);
    $interface = str_replace('$nm_pessoa',$dadosDaPessoa['nm_pessoa'],$interface);
    $interface = str_replace('$id_classificacao',$dadosDaPessoa['id_classificacao'],$interface);

    return $interface;
}


//gastos

function getInterfaceAdicionarGasto($id_pessoa){
    if($id_pessoa<3){
        $interface =  file_get_contents('../../html/gastos/adicionarGasto/index.html');
    }else{
        $interface =  file_get_contents('../../html/gastos/adicionarGasto/gerente/index.html');
    }

    $interface = str_replace('$id_pessoa',$id_pessoa,$interface);


    return $interface;
}

function getInterfaceDeGastos($listaDeGastos, $id_pessoa){

    $interface = file_get_contents('../../arquivosDeInterface/html/gastos/listarGastos/usuario/index.html');
    
    $gastosMoldados = '';

    $valorTotal = 0;
    foreach($listaDeGastos as $gasto){
        $gastosMoldados.='<p>'.$gasto['id_gasto'].'º -- R$'.$gasto['nu_valor'].'</p>';
        $valorTotal+=$gasto['nu_valor'];
    }

    $gastosMoldados.='<p>Valor total: R$'.$valorTotal.'</p>';

    $interface = str_replace("id_pessoa",$id_pessoa,$interface);
    $interface = str_replace("listaDeGastos",$gastosMoldados,$interface);

    return $interface;
}

?>