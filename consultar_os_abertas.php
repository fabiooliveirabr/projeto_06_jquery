<?php
//consultar_os_abertas.php
include "conexao.php";

$sql = "SELECT * FROM tb_ordens_de_servicos
       WHERE status_os='Aberta'";
$consultar = $pdo->prepare($sql);
try{
    $consultar->execute();
    $resultados = $consultar->fetchAll(PDO::FETCH_ASSOC);
    foreach($resultados as $item){
        $id_os = $item['id_os'];
        $data_abertura = $item['data_abertura'];
        $func_responsavel = $item['func_responsavel'];
        $categoria = $item['categoria'];
        $descricao_servico = $item['descricao_servico'];
        $preco = $item['preco'];
        $pagamento = $item['pagamento'];
        $status_os = $item['status_os'];
        echo "
            <div class='cartoes'>
                Nº da OS: <span class='id_os'>$id_os</span> <br>
                Descrição: <span class='desc_servico'>$descricao_servico</span> <br>
            </div>
        ";

    }
}catch(PDOException $erro){
    echo "Falha ao consultar a OS";
}


?>