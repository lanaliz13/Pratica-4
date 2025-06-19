<?php
session_start();

if (!isset($_SESSION["produtos"])) {
    $_SESSION["produtos"] = [];
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Lista de Produtos</title>
    <style>
        body {
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        background-color: #f3f4f6;
        padding: 40px;
        margin: 0;
        }

        h2 {
        color: #1f2937;
        margin-bottom: 24px;
        text-align: center;
        font-size: 1.8rem;
        }

        form {
        background-color: #ffffff;
        padding: 24px;
        border: 1px solid #d1d5db;
        border-radius: 8px;
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.05);
        max-width: 500px;
        margin: 0 auto 30px auto;
        }

        input[type="text"] {
        padding: 12px 14px;
        width: 100%;
        margin-bottom: 16px;
        border: 1px solid #cbd5e1;
        border-radius: 6px;
        font-size: 1rem;
        background-color: #f9fafb;
        transition: border-color 0.2s, box-shadow 0.2s;
        }

        input[type="text"]:focus {
        border-color: #6366f1;
        outline: none;
        box-shadow: 0 0 0 3px rgba(99, 102, 241, 0.2);
        }

        input[type="submit"] {
        background-color: #6366f1;
        color: white;
        padding: 12px 20px;
        border: none;
        border-radius: 6px;
        font-size: 1rem;
        font-weight: 600;
        cursor: pointer;
        transition: background-color 0.3s ease;
        width: 100%;
        }

        input[type="submit"]:hover {
        background-color: #4f46e5;
        }

        .produto {
        padding: 14px 18px;
        margin-bottom: 14px;
        border: 1px solid #e5e7eb;
        border-radius: 6px;
        background-color: #ffffff;
        box-shadow: 0 2px 6px rgba(0, 0, 0, 0.03);
        max-width: 500px;
        margin-left: auto;
        margin-right: auto;
        }

       
      
    </style>
</head>
<body>

<div class="container">
    <h2>Cadastrar Novo Produto</h2>
    
    <form method="post" action="processa_produto.php">
        <label>Nome do Produto:</label><br>
        <input type="text" name="nome" required><br>

        <label>SKU:</label><br>
        <input type="text" name="sku" required><br>

        <input type="submit" value="Cadastrar Produto">
    </form>

    <h2>Produtos Cadastrados</h2>

    <?php
    foreach ($_SESSION["produtos"] as $produto) {
        echo "<div class='produto'>";
        echo "Produto: <strong>{$produto['nome']}</strong> - SKU: <strong>{$produto['sku']}</strong>";
        echo "</div>";
    }
    ?>
</div>

</body>
</html>
