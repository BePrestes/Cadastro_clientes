<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastrar Cliente</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet">



    <link rel="stylesheet" href="assets/style.css">
</head>

<body>
    <div class="container mt-5">
        <div class="card shadow">
            <div class="card-header">
                <h3 class="mb-0">Cadastrar Cliente</h3>
            </div>
            <div class="card-body">
                <form action="salvar.php" method="POST" id="formCliente">
                    <div class="mb-3">
                        <label for="nome" class="form-label">Nome</label>
                        <input type="text" class="form-control" id="nome" name="nome" maxlength="100" required>
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">E-mail</label>
                        <input type="email" class="form-control" id="email" name="email" maxlength="150" required>
                    </div>
                    <div class="mb-3">
                        <label for="telefone" class="form-label">Telefone</label>
                        <input type="text" class="form-control" id="telefone" name="telefone" maxlength="20" required>
                    </div>
                    <div class="d-flex justify-content-between">
                        <a href="index.php" class="btn btn-secondary">Voltar</a>
                        <button type="submit" class="btn btn-success">Salvar Cliente</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script src="assets/js/script.js"></script>
    <script src="assets/js/validacao.js"></script>
</body>

</html>