<?php
session_start();

if (!isset($_SESSION["boletim"])) {
    $_SESSION["boletim"] = [];
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Boletim do Aluno</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

    <h2>Boletim com notas do Aluno de Sistemas de Informação</h2>

    <form method="post" action="boletim.php">
        <label>Disciplina:</label>
        <input type="text" name="disciplina" required>

        <label>Nota:</label>
        <input type="number" name="nota" step="0.1" min="0" max="10" required>

        <input type="submit" value="Adicionar Nota">
    </form>

    <?php if (!empty($_SESSION["boletim"])): ?>
        <h3>Notas cadastradas:</h3>
        <?php foreach ($_SESSION["boletim"] as $materia => $nota):
            $conclusao = ($nota >= 7.0) ? "<span class='aprovado'>Aprovado</span>" : "<span class='reprovado'>Reprovado</span>";
        ?>
            <div class="nota-item">
                <span>Disciplina: <strong><?= htmlspecialchars($materia) ?></strong> - Nota: <strong><?= $nota ?></strong></span>
                <?= $conclusao ?>
            </div>
        <?php endforeach; ?>
    <?php endif; ?>

</body>
</html>
