<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8" />
  <title>Preços em Ordem</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>

<?php
if ($_SERVER["REQUEST_METHOD"] === "POST" && 
    isset($_POST["produtos"]) && isset($_POST["precos"])) {

    $produtos = $_POST["produtos"];
    $precos = $_POST["precos"];

    $precosP = [];
    for ($i = 0; $i < count($produtos); $i++) {
        $nome = trim($produtos[$i]);
        $preco = floatval($precos[$i]);
        if ($nome !== '') {
            $precosP[$nome] = $preco;
        }
    }

    asort($precosP);

    echo "<h2>Ordem crescente</h2>";
    echo "<ul>";
    foreach ($precosP as $produto => $preco) {
        echo "<li><span>$produto</span><span>R$ " . number_format($preco, 2, ',', '.') . "</span></li>";
    }
    echo "</ul>";

    echo '<p style="text-align: center;"><a href="produtos.php" style="color: #bb86fc; text-decoration: none;">← Voltar</a></p>';
}
?>

</body>
</html>
