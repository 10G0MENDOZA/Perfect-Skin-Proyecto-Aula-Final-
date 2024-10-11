<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = $_POST['id'];
    $precio = $_POST['precio'];

    // Si no existe el carrito en la sesión, lo creamos
    if (!isset($_SESSION['carrito'])) {
        $_SESSION['carrito'] = [];
    }

    // Verificar si el producto ya está en el carrito
    $existe = false;
    foreach ($_SESSION['carrito'] as &$item) {
        if ($item['id'] == $id) {
            // Si el producto ya existe en el carrito, solo aumentamos la cantidad
            $item['cantidad']++;
            $existe = true;
            break;
        }
    }

    // Si no existe, lo añadimos al carrito
    if (!$existe) {
        $_SESSION['carrito'][] = [
            'id' => $id,
            'precio' => $precio,
            'cantidad' => 1
        ];
    }

    // Devolver la cantidad total de productos en el carrito
    echo count($_SESSION['carrito']);
}
?>
