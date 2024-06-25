<?php
session_start();
include_once('./function.php');
$nomeprofessor = $_SESSION['nomeProfessor'];
$idturma = $_GET['idturma'];
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Visualizar</title>
    <link rel="stylesheet" href="./css/bootstrap.css">
    <script src="./js/bootstrap.js" defer></script>
    <script src="./js/login.js" defer></script>
    <script src="./js/jQuery.js" defer></script>
</head>

<body>
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container-fluid">
            <a class="navbar-brand" href="./dashboard.php"><?php echo ($nomeprofessor) ?></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
        </div>
        <a href="./sair.php" class="btn btn-danger">Sair</a>
    </nav>
    <div class="container">
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addAtividadeModal">Add atividade</button>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">Número</th>
                    <th scope="col">Nome</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $select = selectWhere('idatividade, nome', 'atividade', 'idturma', $idturma);
                foreach ($select as $linha) {
                    $idatividade = $linha['idatividade'];
                    $nome = $linha['nome'];
                ?>
                    <tr>
                        <th scope="row"><?php echo ($idatividade) ?></th>
                        <td><?php echo ($nome) ?></td>
                    </tr>
                <?php
                }
                ?>
            </tbody>
        </table>
        <!-- Add atividade -->
        <div class="modal fade" id="addAtividadeModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <form action="./inserir.php" method="POST">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="exampleModalLabel">Add atividade</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div class="mb-3">
                                <label for="nomeAtividade" class="form-label">Nome</label>
                                <input type="text" class="form-control" id="nomeAtividade" name="nomeAtividade">
                            </div>
                            <input type="hidden" id="idturma" name="idturma" value="<?php echo ($idturma) ?>">
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
                            <button type="submit" class="btn btn-primary">Add</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
</body>

</html>