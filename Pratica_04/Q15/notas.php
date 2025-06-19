<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8" />
    <title>Resultado do Aluno</title>
    <link rel="stylesheet" href="style.css" />
</head>
<body>

    <h2>Resultado Processado</h2>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $nome = $_POST["nome"];
        $notasTexto = $_POST["notas"];

        $notasArray = array_map('trim', explode(",", $notasTexto));
        $notasNumeros = array_map('floatval', $notasArray);

        if (count($notasNumeros) > 0) {
            $melhorResul = max($notasNumeros);
            echo "<p><strong>$nome</strong>: Melhor resultado = $melhorResul</p>";
        } else {
            echo "<p>Erro: Nenhuma nota válida foi informada.</p>";
        }
    } else {
        echo "<p>Acesso inválido. Volte para o <a href='index.php'>formulário</a>.</p>";
    }
    ?>

    <br><a href="index.php">← Voltar</a>

</body>
</html>
