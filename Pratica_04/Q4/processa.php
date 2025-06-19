<?php
session_start();

$quantidade = (int) ($_POST['quantidade'] ?? 10);
$minimo = (int) ($_POST['minimo'] ?? 1);
$maximo = (int) ($_POST['maximo'] ?? 60);

$_SESSION['quantidade'] = $quantidade;
$_SESSION['minimo'] = $minimo;
$_SESSION['maximo'] = $maximo;

if ($minimo > $maximo) {
    $_SESSION['resultado'] = null;
    header("Location: formulario.php");
    exit;
}

if ($quantidade > ($maximo - $minimo + 1)) {
    $_SESSION['resultado'] = null;
    header("Location: formulario.php");
    exit;
}

function verificaPrimo($valor) {
    if ($valor < 2) return false;
    for ($divisor = 2; $divisor <= sqrt($valor); $divisor++) {
        if ($valor % $divisor == 0) return false;
    }
    return true;
}

$valoresSorteados = [];

while (count($valoresSorteados) < $quantidade) {
    $num = rand($minimo, $maximo);
    if (!in_array($num, $valoresSorteados)) {
        $valoresSorteados[] = $num;
    }
}

$totalPrimos = 0;
foreach ($valoresSorteados as $numero) {
    if (verificaPrimo($numero)) $totalPrimos++;
}

$_SESSION['resultado'] = [
    'valores' => $valoresSorteados,
    'primos' => $totalPrimos
];

header("Location: formulario.php");
exit;
