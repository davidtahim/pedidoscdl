<?php
//1 conectar ao banco de dados
$host = "localhost";
$username = "root";
$password = "root";
$dbname = "pedidos";

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    // set the PDO error mode to exception
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo "Conexão falhou: " . $e->getMessage();
}
//2 receber os dados do formulário
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $data = $_POST["data"];
    $cliente = $_POST["cliente"];
    $produto = $_POST["produto"];
    $quantidade = $_POST["quantidade"];
    $valor_unitario = $_POST["valor_unitario"];
   
//3 salvar os dados no banco de dados

    $sql = "INSERT INTO pedidos (data, cliente, produto, quantidade, valor_unitario) VALUES (:data, :cliente, :produto, :quantidade, :valor_unitario)";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':data', $data);
    $stmt->bindParam(':cliente', $cliente);
    $stmt->bindParam(':produto', $produto);
    $stmt->bindParam(':quantidade', $quantidade);
    $stmt->bindParam(':valor_unitario', $valor_unitario);

    if ($stmt->execute()) {
        echo "Pedido salvo com sucesso!";
        //redirecionar para a página de listagem de pedidos
        header("Location:index.php");
    } else {
        echo "Erro ao salvar o pedido.";
    }
}
?>