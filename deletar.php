<?php
include_once('./function.php');
ob_start();
$idturma = $_POST['idturma'];
$resposta = delete('turma', 'idturma', $idturma);
header('Content-Type: application/json');
echo json_encode($resposta, JSON_UNESCAPED_UNICODE);
ob_end_flush();
