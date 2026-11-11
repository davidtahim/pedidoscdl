<!doctype html>
<html lang="pt-br" data-bs-theme="light">
    <head>
        <title>Sistema de Pedidos</title>
        <!-- Required meta tags -->
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />

        <!-- Bootstrap CSS v5.3.8 -->
        <link
            href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css"
            rel="stylesheet"
            integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB"
            crossorigin="anonymous"
        />
    </head>

    <body>
        <header>
            <!-- place navbar here -->
        </header>
        <main>
            <h1>Sistema de Pedidos</h1>
            <form action="scripts/salvar_pedido.php">
                <label for="data">Data:</label>
                <input type="date" id="data" name="data" required /><br />
                <label for="cliente">Cliente:</label>
                <input type="text" id="cliente" name="cliente" required /><br />
                <label for="produto">Produto:</label>
                <input type="text" id="produto" name="produto" required /><br />
                <label for="quantidade">Quantidade:</label>
                <input type="number" id="quantidade" name="quantidade" required /><br />
                <label for="valor_unitario">Valor Unitário:</label>
                <input type="number" min="0" step="1.00" id="valor_unitario" name="valor_unitario" required /><br />
                <input type="submit" value="Salvar Pedido" />
            </form>
            <hr>
            <table>
                <thead>
                    <tr>
                        <th>Data</th>
                        <th>Cliente</th>
                        <th>Produto</th>
                        <th>Valor</th>
                        <th>Ações</th>
                    </tr>
                
                </thead> 
                <tbody>
                    <?php
                        $host = 'localhost';
                        $user = 'root';
                        $password = '';
                        $database = 'pedidos';
                        $port = 3307;

                        try {
                            $pdo = new PDO("mysql:host=$host;port=$port;dbname=$database", $user, $password);
                        } catch(PDOException $e) {
                            die("Erro ao conectar ao banco de dados: " . $e->getMessage());

                        }

                        $sql = "SELECT * FROM pedidos";
                        $stmt = $pdo->query($sql);
                        $stmt->execute();

                        while($row=$stmt->fetch()) {
                            echo "<tr>";
                            echo "<td>" . $row["data"] . "</td>";
                            echo "<td>" . $row["cliente"] . "</td>";
                            echo "<td>" . $row["produto"] . "</td>";
                            echo "<td>" . $row["valor"] . "</td>";
                            echo "<td><a href='scripts/editar.php?id=" . $row["id"] . "'>Editar</a> | <a href='scripts/excluir.php?id=" . $row["id"] . "'>Excluir</a></td>";
                            echo "</tr>";

                        }

                        
                    ?>
                </tbody>   
            </table>
        </main>
        <footer>
            <!-- place footer here -->
        </footer>
        <!-- Bootstrap JavaScript Bundle (includes Popper) -->
        <script
            src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI"
            crossorigin="anonymous"
        ></script>
    </body>
</html>
