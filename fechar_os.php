<?php
//fechar_os.php
include "conexao.php";
$numero_os = $_POST['numero_os'];

$sql = "UPDATE tb_ordens_de_servicos
        SET status_os='Fechada'
        WHERE id_os='$numero_os'";
$atualizar = $pdo->prepare($sql);
try{
    $atualizar->execute();
    if($atualizar->rowCount()>=1){
        echo "Atualizado com sucesso";
    }else{
        echo "Nada alterado";
    }
}catch(PDOException $erro){
    echo "Falha ao atualizar!".$erro->getMessage();
}

?>