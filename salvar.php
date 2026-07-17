<?php

require_once "config/conexao.php";

if ($_SERVER['REQUEST_METHOD'] === "POST") {

    $nome = trim($_POST["nome"]);
    $email = trim($_POST["email"]);
    $telefone = trim($_POST["telefone"]);

    if (empty($nome) || empty($email) || empty($telefone)) {
        die("Todos os campos são obrigatórios.");
    }

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        die("Informe um e-mail válido.");
    }

    if (strlen($nome) < 3) {
        die("O nome deve conter pelo menos 3 caracteres.");
    }

    if (strlen($telefone) < 8) {
        die("Informe um telefone válido.");
    }

    try {

        $sql = "INSERT INTO clientes (nome, email, telefone) VALUES (:nome, :email, :telefone)";

        $stmt = $conn->prepare($sql);

        $stmt->bindValue(":nome", $nome);
        $stmt->bindValue(":email", $email);
        $stmt->bindValue(":telefone", $telefone);

        $stmt->execute();

        header("Location: index.php");
        exit();
    } catch (PDOException $e) {
        die("Erro ao cadastrar: " . $e->getMessage());
    }
} else {
    header("Location: index.php");
    exit();
}