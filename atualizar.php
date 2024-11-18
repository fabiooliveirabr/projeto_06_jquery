<?php
//atualizar.php
include "conexao.php";
$id_os = $_POST['id_os'];
$data_abertura = $_POST['data_abertura'];
$descricao_servico = $_POST['descricao_servico'];
$func_responsavel = $_POST['func_responsavel'];
$categoria = $_POST['categoria'];
$preco = $_POST['preco'];
$pagamento = $_POST['pagamento'];
$status_os = $_POST['status_os'];

$sql = "UPDATE tb_ordens_de_servicos SET
        data_abertura = '$data_abertura',
        descricao_servico = '$descricao_servico',
        func_responsavel = '$func_responsavel',
        categoria = '$categoria',
        preco = '$preco',
        pagamento = '$pagamento',
        status_os = '$status_os'
        WHERE id_os = '$id_os'";
$atualizar = $pdo->prepare($sql);
try{
    $atualizar->execute();
    if($atualizar->rowCount()>=1){
        echo "Atualizado com sucesso";
    }else{
        echo "Nada alterado";
    }    
}catch(PDOException $erro){
    echo "Erro ao atualizar os dados";
}
?>