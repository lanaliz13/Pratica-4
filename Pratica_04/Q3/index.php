<?php
session_start();

if (!isset($_SESSION['livros'])) {
    $_SESSION['livros'] = [
        "Fim de Caso - Colleen Hoover",
        "Verdades Ocultas - Colleen Hoover",
        "Amor Feio - Colleen Hoover",
        "9 de Novembro - Colleen Hoover",
        "Sem Esperança - Colleen Hoover"
    ];
}

if (isset($_GET['remover']) && is_numeric($_GET['remover'])) {
    $indice = (int) $_GET['remover'];
    if (isset($_SESSION['livros'][$indice])) {
        unset($_SESSION['livros'][$indice]);
        $_SESSION['livros'] = array_values($_SESSION['livros']);
        header("Location: formulario.php");
        exit;
    }
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Gestão de Estoque - Livraria</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

    <h2>Estoque Final de Livros</h2>

    <form method="POST" action="processa.php">
        <label for="livro">Novo Livro:</label>
        <input type="text" name="livro" id="livro" required>
        <button type="submit">Adicionar</button>
    </form>

    <h3>Livros cadastrados:</h3>
    <ul>
        <?php foreach ($_SESSION['livros'] as $key => $livro): ?>
            <li>
                <?= htmlspecialchars($livro) ?>
                <a href="?remover=<?= $key ?>" style="color:red;" onclick="return confirm('Remover este livro?');">[Remover]</a>
            </li>
        <?php endforeach; ?>
    </ul>

</body>
</html>
