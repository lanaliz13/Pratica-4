<?php
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["passaros"])) {
    $listaEspecies = $_POST["passaros"];

    if (in_array('Pardal', $listaEspecies)) {
        echo "<p>A espécie <strong>Pardal</strong> já consta na lista de observações.</p>";
    } else {
        echo "<p>A espécie <strong>Pardal</strong> ainda não consta na lista de observações.</p>";
    }

    $especiesSemRepeticao = array_unique($listaEspecies);

    echo "<p>Espécies únicas observadas (" . count($especiesSemRepeticao) . "):</p>";
    echo "<ul>";
    foreach ($especiesSemRepeticao as $especie) {
        echo "<li>" . htmlspecialchars($especie) . "</li>";
    }
    echo "</ul>";

    echo '<p><a href="registro.php">Voltar ao formulário</a></p>';
} else {
    header("Location: registro.php");
    exit;
}
