<?php
session_start();
include_once('./function.php');
if (isset($_SESSION['idprofessor'])) {
    $idprofessor = $_SESSION['idprofessor'];
    $nomeProfessor = $_SESSION['nomeProfessor'];
} else {
    header('Location: ./sair.php');
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="./css/bootstrap.css">
    <script src="./js/bootstrap.js" defer></script>
    <script src="./js/login.js" defer></script>
    <script src="./js/jQuery.js" defer></script>
</head>

<body>
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container-fluid">
            <a class="navbar-brand" href="./dashboard.php"><?php echo ($nomeProfessor) ?></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
        </div>
        <a href="./sair.php" class="btn btn-danger">Sair</a>
    </nav>
    <div id="conteudo">
        <div class="container">
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">Add turma</button>
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">Número</th>
                        <th scope="col">Nome</th>
                        <th scope="col">Ações</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $select = selectWhere('idturma, idprofessor, nome', 'turma', 'idprofessor', $idprofessor);
                    foreach ($select as $linha) {
                    ?>
                        <?php
                        $idturma = $linha['idturma'];
                        $nome = $linha['nome'];
                        ?>
                        <tr>
                            <th scope="row"><?php echo ($idturma) ?></th>
                            <td><?php echo ($nome) ?></td>
                            <td>
                                <button type="button" class="btn btn-danger" onclick="deletar(<?php echo ($idturma) ?>)">deletar</button>
                                <a href="./ver.php?idturma=<?php echo ($idturma) ?>" class="btn btn-success">ver</a>
                            </td>
                        </tr>
                    <?php
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</body>

</html>
<!-- Modal add turma -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="./inserir.php" method="POST">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Add turma</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="nomeTurma" class="form-label">Nome da turma</label>
                        <input type="text" class="form-control" id="nomeTurma" name="nomeTurma">
                    </div>
                    <div class="mb-3">
                        <input type="hidden" class="form-control" id="idprofessor" name="idprofessor" value="<?php echo ($idprofessor) ?>">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
                    <button type="submit" class="btn btn-primary">Add</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- Modal deletar -->
<div class="modal fade" id="deletarModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Tem certeza?</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                Deseja mesmo excluir essa turma?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
                <button type="button" class="btn btn-danger" id="botaoExcluir">Deletar</button>
            </div>
        </div>
    </div>
</div>