<?php
include_once('function.php');
ob_start();
$idturma = $_POST['idturma'];
$select = selectWhere('*', 'atividade', 'idturma', $idturma);
$resposta = ['ata' => 'po'];
if ($select->rowCount() > 0) {
    $resposta = ['success' => true];
} else {
    $resposta = ['success' => false];
}
header('Content-Type: application/json');
echo json_encode($resposta, JSON_UNESCAPED_UNICODE);
ob_end_flush();
