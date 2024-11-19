<?php
//cadastrar.php
include "conexao.php";
$descricao = $_POST['descricao'];
$preco = $_POST['preco'];
$func = $_POST['func'];
$categoria = $_POST['categoria'];
$pagamento = $_POST['pagamento'];
$status = $_POST['status'];

//1º Passo - comando SQL
$sql = "INSERT INTO tb_ordens_de_servicos
        (descricao_servico, func_responsavel,
        categoria, preco, pagamento, status_os)
        VALUES
        ('$descricao', '$func', '$categoria',
        '$preco', '$pagamento', '$status')";
//2º Passo - preparar a conexão
$inserir = $pdo->prepare($sql);
//3º Passo - tentar executar
try{
    $inserir->execute();
    echo "Ordem de Serviço Cadastrada com Sucesso!";
}catch(PDOException $erro){
    echo "Falha ao cadastrar!".$erro->getMessage();
}

?>