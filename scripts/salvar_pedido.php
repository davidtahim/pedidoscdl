<?php
//1 conectar ao banco de dados
$host = "localhost";
$username = "root";
$password = "";
$dbname = "pedidos";
$port = 3307;

try {
    $pdo = new PDO("mysql:host=$host;port=$port;dbname=$dbname", $username, $password);
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
    $valor = $_POST["valor"];
   
//3 salvar os dados no banco de dados

    $sql = "INSERT INTO pedidos (data, cliente, produto, quantidade, valor) VALUES (:data, :cliente, :produto, :quantidade, :valor)";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':data', $data);
    $stmt->bindParam(':cliente', $cliente);
    $stmt->bindParam(':produto', $produto);
    $stmt->bindParam(':quantidade', $quantidade);
    $stmt->bindParam(':valor', $valor);

    if ($stmt->execute()) {
        echo "Pedido salvo com sucesso!";
        //redirecionar para a página de listagem de pedidos
        header("Location:index.php");
    } else {
        echo "Erro ao salvar o pedido.";
    }
}
?>