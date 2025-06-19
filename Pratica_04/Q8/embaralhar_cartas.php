<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8" />
  <title>Resultado do Embaralhamento</title>
</head>
<body>

<h2>Jogo de Cartas Digital</h2>

<?php
if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST["cartas"]) && is_array($_POST["cartas"])) {
    $cartas = array_filter($_POST["cartas"], fn($c) => trim($c) !== '');

    if (count($cartas) === 0) {
        echo "<p>Nenhuma carta foi inserida.</p>";
        echo '<p><a href="jogo_cartas.php">← Voltar</a></p>';
        exit;
    }

    echo "<h3>Antes de embaralhar:</h3>";
    echo "<ul>";
    foreach ($cartas as $carta) {
        echo "<li>" . htmlspecialchars($carta) . "</li>";
    }
    echo "</ul>";

    shuffle($cartas);

    echo "<h3>Baralho após o embaralhamento:</h3>";
    echo "<ul>";
    foreach ($cartas as $carta) {
        echo "<li>" . htmlspecialchars($carta) . "</li>";
    }
    echo "</ul>";

    echo '<p><a href="jogo_cartas.php">← Voltar</a></p>';
} else {
    header("Location: jogo_cartas.php");
    exit;
}
?>

</body>
</html>
