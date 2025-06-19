<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Registros de Treino da Academia</title>
    <link rel="stylesheet" href="style.css" />
</head>
<body>

    <h2>Registros de Treino da Academia</h2>

    <?php
    $registro = [
        ["nome" => "Ana maria", "resultados" => [60, 51, 52]],
        ["nome" => "Laura", "resultados" => [40, 42, 38, 45]],
        ["nome" => "Leticia", "resultados" => [70, 65, 72, 68]]
    ];

    foreach ($registro as $aluno) {
        $nome = htmlspecialchars($aluno["nome"]);
        $resultados = $aluno["resultados"];
        $media = array_sum($resultados) / count($resultados);

        echo "<div class='registro'>";
        echo "<div class='aluno'>Aluno: $nome</div>";
        echo "<div class='media'>Média de desempenho: " . number_format($media, 2, ',', '.') . "</div>";
        echo "</div>";
    }
    ?>

    <p><a href="index.html">← Voltar ao Cadastro</a></p>

</body>
</html>
