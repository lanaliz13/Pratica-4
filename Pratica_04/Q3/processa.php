<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (!empty(trim($_POST['livro']))) {
        $novoLivro = trim($_POST['livro']);

        if (!isset($_SESSION['livros'])) {
            $_SESSION['livros'] = [];
        }

        $_SESSION['livros'][] = $novoLivro;
    }
}

header("Location: formulario.php");
exit;
