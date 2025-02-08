<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $data = json_decode(file_get_contents('php://input'));

    $fila = $data->filas;
    $columna = $data->columnas;

    session_start();
    $tablero = $_SESSION['tablero'];

    echo json_encode([
        'valor' => $tablero[$fila][$columna],

    ]);
}
?>