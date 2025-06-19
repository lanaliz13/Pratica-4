<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Recebe o texto, divide e limpa espaços
    $listaParticipantes = array_filter(array_map('trim', explode(',', $_POST['participantes'] ?? '')));

    // Remove duplicados
    $Unicos = array_unique($listaParticipantes);

    // Reindexa
    $Unicos = array_values($Unicos);

} else {
    header("Location: index.html");
    exit;
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8" />
    <title>Lista Única de Participantes - Resultado</title>
    <link rel="stylesheet" href="style.css" />

</head>
<body>

    <h2>Lista Única de Participantes</h2>

    <?php if (count($Unicos) > 0): ?>
        <ul>
            <?php foreach ($Unicos as $participante): ?>
                <li><?php echo htmlspecialchars($participante); ?></li>
            <?php endforeach; ?>
        </ul>
    <?php else: ?>
        <p><em>Nenhum participante válido informado.</em></p>
    <?php endif; ?>

    <p><a href="index.html">Voltar ao formulário</a></p>

</body>
</html>
