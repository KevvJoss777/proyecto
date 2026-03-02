<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

require 'includes/funciones.php';

$id = $_GET['id'];
$libro = obtener_libro($id);

if($_POST){
    $_POST['id'] = $id;
    actualizar_libro($_POST);
    header("Location: index.php");
}
?>

<!DOCTYPE html>
<html>
<head>
<title>Editar Libro</title>
<link rel="stylesheet" href="build/css/style.css">
</head>
<body>

<h1>Editar Libro</h1>

<form method="POST">
<input type="text" name="titulo" value="<?php echo $libro['titulo']; ?>" required>
<input type="text" name="autor" value="<?php echo $libro['autor']; ?>" required>
<input type="text" name="editorial" value="<?php echo $libro['editorial']; ?>">
<input type="number" name="anio" value="<?php echo $libro['anio_publicacion']; ?>">
<input type="text" name="isbn" value="<?php echo $libro['isbn']; ?>">
<input type="text" name="genero" value="<?php echo $libro['genero']; ?>">
<input type="number" name="paginas" value="<?php echo $libro['numero_paginas']; ?>">
<input type="text" name="idioma" value="<?php echo $libro['idioma']; ?>">
<input type="number" name="ejemplares" value="<?php echo $libro['ejemplares']; ?>">
<input type="text" name="ubicacion" value="<?php echo $libro['ubicacion']; ?>">
<button type="submit">Actualizar</button>
</form>

</body>
</html>