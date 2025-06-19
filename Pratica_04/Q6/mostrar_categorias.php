<?php
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["categorias"])) {
    $categoriasProdutos = $_POST["categorias"];

    $Cres = $categoriasProdutos;
    sort($Cres);

    echo "<h3>Ordem Crescente</h3>";
    echo "<ul>";
    foreach ($Cres as $categoria) {
        echo "<li>" . htmlspecialchars($categoria) . "</li>";
    }
    echo "</ul>";

    $Dec = $categoriasProdutos;
    rsort($Dec);

    echo "<h3>Ordem Decrescente</h3>";
    echo "<ul>";
    foreach ($Dec as $categoria) {
        echo "<li>" . htmlspecialchars($categoria) . "</li>";
    }
    echo "</ul>";

    echo '<p><a href="categorias.php">Voltar ao formulário</a></p>';

} else {
    header("Location: categorias.php");
    exit;
}