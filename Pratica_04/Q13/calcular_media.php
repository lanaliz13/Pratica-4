<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $despesasStrings = array_filter(array_map('trim', explode(',', $_POST['despesas'] ?? '')));

    $despesas = array_filter(array_map(function($v) {
        return is_numeric($v) ? floatval($v) : null;
    }, $despesasStrings), function($v) {
        return $v !== null;
    });

    if (count($despesas) > 0) {
        $total = array_sum($despesas);
        $qtde = count($despesas);
        $media = $total / $qtde;
    } else {
        $media = null;
    }
} else {
    header("Location: index.html");
    exit;
}
?>
