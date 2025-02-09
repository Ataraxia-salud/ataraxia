<?php
session_start();

if (!isset($_SESSION['pendientes2'])) {
    $_SESSION['pendientes2'] = [];
}


if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['accion'])) {
    $accion = $_POST['accion'];

    if ($accion === 'agregar') {
        $tarea = $_POST['tarea'];
        $_SESSION['pendientes2'][] = ['tarea' => $tarea, 'estado' => 'pendiente'];
    } elseif ($accion === 'terminar') {
        $index = $_POST['index'];
        $_SESSION['pendientes2'][$index]['estado'] = 'terminado';
    } elseif ($accion === 'eliminar') {
        $index = $_POST['index'];
        array_splice($_SESSION['pendientes2'], $index, 1);
    }

    echo json_encode($_SESSION['pendientes2']);
    exit;
}


echo json_encode($_SESSION['pendientes2']);
?>