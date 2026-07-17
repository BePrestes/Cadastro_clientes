<?php
require_once "config/conexao.php";

if (!isset($_GET["id"])) {
    header("Location: index.php");
    exit();
}

$id = $_GET["id"];

try {
    $sql = "DELETE FROM clientes WHERE id = :id";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(":id", $id, PDO::PARAM_INT);
    $stmt->execute();

    header("Location: index.php");
    exit();
} catch (PDOException $e) {
    die("Erro ao excluir cliente: " . $e->getMessage());
}