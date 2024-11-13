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
        $somente_data = date('d/m/Y', strtotime($data_abertura));
        $somente_hora = date('H:i:s', strtotime($data_abertura));
        echo "
            <div class='cartoes'>
                Nº da OS: <span class='id_os'>$id_os</span> <br>
                Descrição: <span class='desc_servico'>$descricao_servico</span> <br>
                Data/Hora abertura: <span class='data_hora'>
                                        $somente_data às $somente_hora
                                    </span> <br> 
                Preço: R$ <span class='preco'>$preco</span> <br>
                Funcionário responsável: <span class='f_resp>$func_responsavel</span> <br>
                Categoria: <span class='categoria'>$categoria</span> <br>
                Situação do pagamento: <span class='s_paga'>$pagamento</span> <br>
                Status: <span class='status'>$status_os</span> <br> <br>
                <button id='btnFechar' id_os='$id_os'> Fechar OS</button>
            </div>
        ";

    }
}catch(PDOException $erro){
    echo "Falha ao consultar a OS";
}


?>