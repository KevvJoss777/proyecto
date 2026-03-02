<?php
require 'includes/funciones.php';

if($_POST){
    crear_libro($_POST);
    header("Location: index.php");
}
?>

<form method="POST" onsubmit="return validarFormulario();">
<input type="text" name="titulo" placeholder="Título" required>
<input type="text" name="autor" placeholder="Autor" required>
<input type="text" name="editorial" placeholder="Editorial">
<input type="number" name="anio" placeholder="Año">
<input type="text" name="isbn" placeholder="ISBN">
<input type="text" name="genero" placeholder="Género">
<input type="number" name="paginas" placeholder="Páginas">
<input type="text" name="idioma" placeholder="Idioma">
<input type="number" name="ejemplares" placeholder="Ejemplares">
<input type="text" name="ubicacion" placeholder="Ubicación">
<button type="submit">Guardar</button>
</form>

<script src="build/js/validations.js"></script>
<link rel="stylesheet" href="build/css/style.css">