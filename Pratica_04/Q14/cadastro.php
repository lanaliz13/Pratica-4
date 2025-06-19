<?php
if ($_SERVER["REQUEST_METHOD"] === "POST") {

    $nome = trim($_POST["nome"] ?? "");
    $resultados_str = $_POST["resultados"] ?? "";

    $resultados_array = array_filter(array_map('trim', explode(',', $resultados_str)), function($v) {
        return is_numeric($v);
    });

    $resultados = array_map('floatval', $resultados_array);

    if ($nome && count($resultados) > 0) {
       
        echo "<!DOCTYPE html><html lang='pt-br'><head><meta charset='UTF-8'><title>Cadastro Realizado</title>";
        echo "<link rel='stylesheet' href='style.css' />";
        echo "</head><body>";
        echo "<h2>Cadastro Realizado</h2>";
        echo "<div class='registro'>";
        echo "<div class='aluno'>Aluno: " . htmlspecialchars($nome) . "</div>";
        $media = array_sum($resultados) / count($resultados);
        echo "<div class='media'>Média de desempenho: " . number_format($media, 2, ',', '.') . "</div>";
        echo "</div>";
        echo "<p><a href='index.html'>Cadastrar outro aluno</a></p>";
        echo "<p><a href='registros.php'>Ver registros</a></p>";
        echo "</body></html>";
        exit;

    } else {
        header("Location: index.html");
        exit;
    }
} else {
    header("Location: index.html");
    exit;
}
