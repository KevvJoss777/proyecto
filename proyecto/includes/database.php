<?php
$conexion = new mysqli("localhost", "root", "", "biblioteca");

// Verificar conexión
if ($conexion->connect_error) {
    die("Error de conexión: " . $conexion->connect_error);
}

// Configurar caracteres para evitar errores con acentos
$conexion->set_charset("utf8");
?>