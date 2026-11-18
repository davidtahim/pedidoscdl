<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

$host = "localhost";
$username = "root";
$password = "";
$dbname = "pedidos";
$port = 3307;

try {
    $pdo = new PDO("mysql:host=$host;port=$port;dbname=$dbname", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Conexão falhou: " . $e->getMessage());
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $data = $_POST["data"];
    $cliente = $_POST["cliente"];
    $produto = $_POST["produto"];
    $quantidade = $_POST["quantidade"];
    $valor = $_POST["valor"];
   
    $sql = "INSERT INTO pedidos (data, cliente, produto, quantidade, valor) VALUES (:data, :cliente, :produto, :quantidade, :valor)";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':data', $data);
    $stmt->bindParam(':cliente', $cliente);
    $stmt->bindParam(':produto', $produto);
    $stmt->bindParam(':quantidade', $quantidade);
    $stmt->bindParam(':valor', $valor);

    if ($stmt->execute()) {
        header("Location: ../index.php");
        exit();
    } else {
        echo "Erro ao salvar o pedido.";
    }
}
?>