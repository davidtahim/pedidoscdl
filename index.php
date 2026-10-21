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
