<?php
//deletar.php
include "conexao.php";
$id_os = $_POST['id_os'];
$sql = "DELETE FROM tb_ordens_de_servicos
        WHERE id_os='$id_os'";
$deletar = $pdo->prepare($sql);
try{
    $deletar->execute();
    if($deletar->rowCount()>=1){
        echo "Deletado com sucesso!";
    }else{
        echo "Nada foi deletado!";
    }
}catch(PDOException $erro){
    echo "Falha ao deletar!";
}



?>