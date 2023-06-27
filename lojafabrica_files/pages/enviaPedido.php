<?php
//print_r($_POST);
include 'functions.php';

if(isset($_POST['produto']) && isset($_POST['textoPersonalizacao']) && isset($_POST['logoCodPersonalizacao']) && isset($_POST['flexSwitchPrioridade'])){
    $prioridade = 0;
    if($_POST['flexSwitchPrioridade'] == 'true'){
        $prioridade = 1;
    }

    $queryItensProduto = array();
    $sqlItensProduto = "SELECT * FROM lojafabrica_tb_produto LEFT JOIN lojafabrica_tb_itemproduto ON lojafabrica_tb_produto.n_produto_produto = lojafabrica_tb_itemproduto.n_produto_produto WHERE lojafabrica_tb_produto.n_produto_produto = '".$_POST['produto']."'";
    $queryItensProduto = getSelectBD($sqlItensProduto);
    if (count($queryItensProduto) <= 0){
      echo "Houve um erro ao obter dados do produto.";
    }

    //echo $prioridade;
    $sql = "INSERT INTO lojafabrica_tb_pedido (n_prioridade_pedido) VALUES ('".$prioridade."')";
    $query = execCommandBD($sql);
    if (!$query) {
        echo "Houve um erro ao cadastrar o pedido.";
    } else {
        $dadosInseridos = array();
        foreach ($queryItensProduto as $key => $value) {

            $textoGravacao = '';
            if($_POST['textoPersonalizacao'] != '0' && $value['c_personalizavel_itemproduto']){
                $textoGravacao = $_POST['textoPersonalizacao'];
            }


            $logoGravacao = '0';
            if($_POST['logoCodPersonalizacao'] != '0' && $value['c_personalizavel_itemproduto']){
                $logoGravacao = '\''.$_POST['logoCodPersonalizacao'].'\'';
            } else if ($value['n_personalizacaopadrao_itemproduto'] != null){
                $logoGravacao = '\''.$value['n_personalizacaopadrao_itemproduto'].'\'';
            }

            //echo $logoGravacao;
            $sql_filaproducao = "INSERT INTO lojafabrica_tb_filaproducao (n_pedido_pedido,n_itemproduto_itemproduto, s_texto_personalizacao_pedidoprodutos, n_personalizacao_personalizacao) VALUES ('".$query."','".$value['n_itemproduto_itemproduto']."','".$textoGravacao."',".$logoGravacao.")";
            //echo $sql_filaproducao;
            $query_filaproducao = execCommandBD($sql_filaproducao);
            if (!$query_filaproducao) {
                array_push($dadosInseridos, false);
            } else {
                array_push($dadosInseridos, true);
            }
        }

        if (in_array(false, $dadosInseridos)){
            echo "Houve um erro ao cadastrar pelo menos um item do produto.";
            print_r($_POST);
        } else {
            echo "Enviado para fabricação";
        }

        $sql = "INSERT INTO lojafabrica_tb_pedidoprodutos (n_pedido_pedido,n_produto_produto,s_texto_personalizacao_pedidoprodutos,n_personalizacao_personalizacao) VALUES ('".$query."','".$_POST['produto']."','".$textoGravacao."','".$logoGravacao."')";
        // //echo $sql;
        // $query = execCommandBD($sql);
        // if (!$query) {
        //     echo "Houve um erro ao cadastrar o pedido.";
        // } else {
        //     echo "Enviado para fabricação";
        // }
    }
} else {
    echo "Faltam parâmetros";
}

?>