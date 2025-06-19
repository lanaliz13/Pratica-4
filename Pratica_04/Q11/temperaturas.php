<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $tempStrings = array_filter(array_map('trim', explode(',', $_POST['temperaturas'] ?? '')));

    $temperaturas = array_filter(array_map(function($v) {
        return is_numeric($v) ? floatval($v) : null;
    }, $tempStrings), function($v) {
        return $v !== null;
    });

    if (count($temperaturas) > 0) {
        $Temperatura_quente = max($temperaturas);
        $Temperatura_fria = min($temperaturas);
    } else {
        $Temperatura_quente = null;
        $Temperatura_fria = null;
    }

} else {
    header("Location: index.html");
    exit;
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8" />
    <title>Resultado - Monitoramento de Temperatura</title>
    <link rel="stylesheet" href="style.css" />
</head>
<body>
    <main>
        <h2>Resultado do Monitoramento</h2>

        <?php if ($Temperatura_quente !== null && $Temperatura_fria !== null): ?>
            <p>Essa é a maior temperatura registrada: <strong><?php echo number_format($Temperatura_quente, 1, ',', '.'); ?>°C</strong></p>
            <p>Essa é a menor temperatura registrada: <strong><?php echo number_format($Temperatura_fria, 1, ',', '.'); ?>°C</strong></p>
        <?php else: ?>
            <p><em>Não foram informadas temperaturas válidas.</em></p>
        <?php endif; ?>

        <a href="index.html">← Voltar ao formulário</a>
    </main>
</body>
</html>
