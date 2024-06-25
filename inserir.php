<?php
include_once('function.php');
if (isset($_POST['nomeTurma'])) {
    $idprofessor = $_POST['idprofessor'];
    $nomeTurma = $_POST['nomeTurma'];
    insertTwoFields('turma', 'idprofessor, nome', $idprofessor, $nomeTurma);
    header('Location: dashboard.php');
}
if (isset($_POST['nomeAtividade'])) {
    $idturma = $_POST['idturma'];
    $nomeAtividade = $_POST['nomeAtividade'];
    insertTwoFields('atividade', 'idturma, nome', $idturma, $nomeAtividade);
    header('Location: dashboard.php');
}
