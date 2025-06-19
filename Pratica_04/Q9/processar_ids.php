<?php
// Verifica se o formulário foi enviado
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Recebe os dados do formulário e cria arrays, removendo espaços
    $idsFonteA = array_filter(array_map('trim', explode(',', $_POST['idsFonteA'] ?? '')));
    $idsFonteB = array_filter(array_map('trim', explode(',', $_POST['idsFonteB'] ?? '')));

    // Converte para inteiro (caso sejam números)
    $idsFonteA = array_map('intval', $idsFonteA);
    $idsFonteB = array_map('intval', $idsFonteB);

    // Junta os arrays
    $todos_Ids = array_merge($idsFonteA, $idsFonteB);

    // Remove duplicados
    $todos_Ids = array_unique($todos_Ids);

    // Reindexa
    $todos_Ids = array_values($todos_Ids);
} else {
    // Se acessar direto o PHP, redireciona para o formulário
    header("Location: index.html");
    exit;
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8" />
    <title>Resultado - Consolidação de IDs</title>
</head>
<body>

    <h2>Resultado da Consolidação</h2>

    <?php if (count($todos_Ids) > 0): ?>
        <p>IDs combinados e únicos:</p>
        <ul>
            <?php foreach ($todos_Ids as $id): ?>
                <li><?php echo htmlspecialchars($id); ?></li>
            <?php endforeach; ?>
        </ul>
    <?php else: ?>
        <p><em>Nenhum ID válido informado.</em></p>
    <?php endif; ?>

    <p><a href="index.html">Voltar ao formulário</a></p>

</body>
</html>
