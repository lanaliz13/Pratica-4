<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8" />
    <title>Resultado da Geração</title>
</head>
<body>

    <h2>Resultado da Geração</h2>

    <?php
    if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST['caracteres'])) {
        $entrada = $_POST['caracteres'];
        $arrayPermitidos = array_map('trim', explode(',', $entrada));
        $stringBase = implode('', $arrayPermitidos);

        echo "<p><strong>String gerada:</strong> $stringBase</p>";
    } else {
        echo "<p>Nenhum dado recebido.</p>";
    }
    ?>

    <p><a href="index.php">Voltar</a></p>

</body>
</html>
