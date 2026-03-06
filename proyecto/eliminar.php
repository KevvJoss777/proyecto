<?php
require 'includes/funciones.php';

// Verificar que exista el ID
if(!isset($_GET['id'])){
    header("Location: index.php");
    exit;
}

$id = (int)$_GET['id'];

// Verificar que sea válido
if($id <= 0){
    header("Location: index.php");
    exit;
}

// Eliminar libro
eliminar_libro($id);

header("Location: index.php");
exit;
?>