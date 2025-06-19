<?php
session_start();
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Sorteio e Números Primos</title>
</head>
<body>

    <h2>Sorteio de Números e Contagem de Primos</h2>

    <form method="POST" action="primo.php">
        <label for="quantidade">Quantidade de números para sortear:</label>
        <input type="number" name="quantidade" id="quantidade" min="1" max="100" value="<?= isset($_SESSION['quantidade']) ? (int)$_SESSION['quantidade'] : 10 ?>" required>
        <br><br>
        <label for="minimo">Valor mínimo do sorteio:</label>
        <input type="number" name="minimo" id="minimo" min="1" value="<?= isset($_SESSION['minimo']) ? (int)$_SESSION['minimo'] : 1 ?>" required>
        <br><br>
        <label for="maximo">Valor máximo do sorteio:</label>
        <input type="number" name="maximo" id="maximo" min="1" value="<?= isset($_SESSION['maximo']) ? (int)$_SESSION['maximo'] : 60 ?>" required>
        <br><br>
        <button type="submit">Sortear</button>
    </form>

    <hr>

    <?php if (isset($_SESSION['resultado'])): ?>
        <p>Números sorteados: <strong><?= htmlspecialchars(implode(", ", $_SESSION['resultado']['valores'])) ?></strong></p>
        <p>Quantidade de números primos sorteados: <strong><?= (int)$_SESSION['resultado']['primos'] ?></strong></p>
    <?php endif; ?>

</body>
</html>
