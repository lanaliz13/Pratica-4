<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST["disciplina"], $_POST["nota"])) {
    $disciplina = htmlspecialchars($_POST["disciplina"]);
    $nota = floatval($_POST["nota"]);

    if (!isset($_SESSION["boletim"])) {
        $_SESSION["boletim"] = [];
    }

    $_SESSION["boletim"][$disciplina] = $nota;
}

header("Location: index.php");
exit;
