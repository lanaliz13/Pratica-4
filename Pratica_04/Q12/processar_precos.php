<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $precosStrings = array_filter(array_map('trim', explode(',', $_POST['precosAntigos'] ?? '')));

    $precosAntigos = array_filter(array_map(function($v) {
        return is_numeric($v) ? floatval($v) : null;
    }, $precosStrings), function($v) {
        return $v !== null;
    });

    $precosNovos = array_map(function($preco) {
        return $preco * 1.10;
    }, $precosAntigos);

} else {
    header("Location: index.html");
    exit;
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8" />
    <title>Resultado - Aumento de Preços</title>
    <link rel="stylesheet" href="style.css" />
</head>
<body>
    <main>
        <h2>Comparação de Preços (Antes e Depois do Aumento)</h2>

        <?php if (count($precosAntigos) > 0): ?>
            <table>
                <thead>
                    <tr>
                        <th>Preço Antigo (R$)</th>
                        <th>Preço Novo (R$)</th>
                    </tr>
                </thead>
                <tbody>
                    <?php for ($i = 0; $i < count($precosAntigos); $i++): ?>
                        <tr>
                            <td><?php echo number_format($precosAntigos[$i], 2, ',', '.'); ?></td>
                            <td><?php echo number_format($precosNovos[$i], 2, ',', '.'); ?></td>
                        </tr>
                    <?php endfor; ?>
                </tbody>
            </table>
        <?php else: ?>
            <p><em>Nenhum preço válido informado.</em></p>
        <?php endif; ?>

        <a href="index.html">← Voltar ao formulário</a>
    </main>
</body>
</html>
