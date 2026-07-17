<?php
require_once "config/conexao.php";
if ($_SERVER['REQUEST_METHOD'] === "POST") {
    $nome = trim($_POST["nome"]);
    $email = trim($_POST["email"]);
    $telefone = trim($_POST["telefone"]);

    if (empty($nome) || empty($email) || empty($telefone)) {
        die("Todos os campos são obrigatórios.");
    }
    try {
        $sql = "UPDATE clientes
        SET nome= :nome,
        email=:email,
        telefone=:telefone
        WHERE id = :id";
        $stmt = $conn->prepare($sql);



        $stmt->bindParam(":nome", $nome);
        $stmt->bindParam(":email", $email);
        $stmt->bindParam(":telefone", $telefone);

        $stmt->execute();
        header("Location: index.php");
        exit();
    } catch (PDOException $e) {
        die("Erro ao atualizar cliente: " . $e->getMessage());
    }
}
if (!isset($_GET["id"])) {
    header("Location: index.php");
    exit();
}
$id = $_GET["id"];
try {
    $sql = "SELECT * FROM clientes WHERE id = :id";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(":id", $id, PDO::PARAM_INT);
    $stmt->execute();

    $cliente = $stmt->fetch(PDO::FETCH_ASSOC);

    if (!$cliente) {
        die("Cliente não encontrado.");
    }
} catch (PDOException $e) {

    die("Erro ao buscar cliente: " . $e->getMessage());
} ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Cliente</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet">


    <link rel="stylesheet" href="assets/style.css">

</head>


<body>
    <div class="container mt-5">

        <div class="card shadow">

            <div class="card-header">
                <h3 class="mb-0">Editar Cliente</h3>
            </div>

            <div class="card-body">

                <form method="POST">

                    <input type="hidden" name="id" value="<?= htmlspecialchars($cliente["id"]) ?>">

                    <div class="mb-3">

                        <label class="form-label">Nome</label>

                        <input type="text" name="nome" class="form-control" maxlength="100"
                            value="<?= htmlspecialchars($cliente["nome"]) ?>" required>

                    </div>

                    <div class="mb-3">

                        <label class="form-label">E-mail</label>

                        <input type="email" name="email" class="form-control" maxlength="150"
                            value="<?= htmlspecialchars($cliente["email"]) ?>" required>

                    </div>

                    <div class="mb-3">

                        <label class="form-label">Telefone</label>

                        <input type="text" name="telefone" class="form-control" maxlength="20"
                            value="<?= htmlspecialchars($cliente["telefone"]) ?>" required>

                    </div>

                    <div class="d-flex justify-content-between">

                        <a href="index.php" class="btn btn-secondary">
                            Cancelar
                        </a>

                        <button type="submit" class="btn btn-success">

                            Atualizar Cliente

                        </button>

                    </div>

                </form>

            </div>

        </div>

    </div>

    <script src="assets/js/script.js"></script>
    <script src="assets/js/validacao.js"></script>

</body>

</html>