<?php
require 'includes/funciones.php';

$id = $_GET['id'];
eliminar_libro($id);

header("Location: index.php");
?>