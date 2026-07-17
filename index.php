<?php
require_once "config/conexao.php";

try {
    $sql = "SELECT * FROM clientes ORDER BY id DESC";
    $stmt = $conn->query($sql);
    $clientes = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    die("Erro ao buscar clientes: " . $e->getMessage());
}
?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistema de Cadastro de Clientes</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet">

    <link rel="stylesheet" href="assets/style.css">
</head>

<body>

    <div class="container mt-5">
        <div class="d-flex justify-content-between align-itens mb-4">
            <h2>Sistema de Cadastro de Clientes</h2>
            <a href="cadastrar.php" class="btn btn-primary">
                Novo Cliente
            </a>
        </div>
        <?php if (count($clientes) > 0): ?>

        <table class="table table-bordered table-hover align-middle">
            <thead class="table-dark">
                <tr>
                    <th>ID</th>
                    <th>Nome</th>
                    <th>E-mail</th>
                    <th>Telefone</th>
                    <th widht="180">Ações</th>
                </tr>
            </thead>

            <tbody>
                <?php foreach ($clientes as $cliente): ?>
                <tr>
                    <td><?= htmlspecialchars($cliente['id']) ?></td>

                    <td><?= htmlspecialchars($cliente['nome']) ?></td>

                    <td><?= htmlspecialchars($cliente['email']) ?></td>

                    <td><?= htmlspecialchars($cliente['telefone']) ?></td>

                    <td>
                        <a href="editar.php?id=<?= $cliente['id'] ?>" class=" btn btn-warning btn-sm">
                            Editar
                        </a>
                        <a href="excluir.php?id=<?= $cliente['id'] ?>" class="btn btn-warning btn-excluir">Excluir</a>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
        <?php else: ?>
        <div class="alert alert-info">
            Nenhum cliente cadastrado.
        </div>
        <?php endif; ?>
    </div>
    <script src="assets/js/script.js"></script>
    <script src="assets/js/validacao.js"></script>
</body>

</html>