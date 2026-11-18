<?php

include 'conecta.php';

if(!isset($_GET['id'])) {
    header("Location: ../index.php");
    exit();
}

$id = $_GET['id'];

$sql = "SELECT * FROM pedidos WHERE id = :id";
$stmt = $pdo->prepare($sql);
$stmt->bindParam(':id', $id);
$stmt->execute();
$pedido = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$pedido) {
    header("Location: ../index.php");
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $data = $_POST["data"];
    $cliente = $_POST["cliente"];
    $produto = $_POST["produto"];
    $quantidade = $_POST["quantidade"];
    $valor = $_POST["valor"];

    $sql = "UPDATE pedidos SET data = :data, cliente = :cliente, produto = :produto, quantidade = :quantidade, valor = :valor WHERE id = :id";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':data', $data);
    $stmt->bindParam(':cliente', $cliente);
    $stmt->bindParam(':produto', $produto);
    $stmt->bindParam(':quantidade', $quantidade);
    $stmt->bindParam(':valor', $valor);
    $stmt->bindParam(':id', $id);
    $stmt->execute();

    header("Location: ../index.php");

}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Pedido</title>
</head>
<body>
    <h1>Editar Pedido</h1>

    <form action="" method="post">

    </form>
</body>
</html>