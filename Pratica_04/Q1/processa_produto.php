<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["nome"]) && isset($_POST["sku"])) {
    $novoProduto = [
        "nome" => htmlspecialchars($_POST["nome"]),
        "sku" => htmlspecialchars($_POST["sku"])
    ];

    if (!isset($_SESSION["produtos"])) {
        $_SESSION["produtos"] = [];
    }

    $_SESSION["produtos"][] = $novoProduto;
}

header("Location: index.php");
exit;
