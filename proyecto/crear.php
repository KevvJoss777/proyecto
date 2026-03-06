<?php
require 'includes/funciones.php';

$errores = [];
$datos = [];

if($_SERVER['REQUEST_METHOD'] === 'POST'){

    $datos = $_POST;

    $resultado = crear_libro($datos, $errores);

    if($resultado && empty($errores)){
        header("Location: index.php");
        exit;
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Agregar Libro</title>
    <link rel="stylesheet" href="build/css/style.css">
</head>


<body>

<h1>Agregar Libro</h1>

<form method="POST" onsubmit="return validarFormulario()">

<input type="text" name="titulo" placeholder="Título"
value="<?php echo $datos['titulo'] ?? ''; ?>">
<?php if(isset($errores['titulo'])): ?>
<p class="error"><?php echo $errores['titulo']; ?></p>
<?php endif; ?>

<input type="text" name="autor" placeholder="Autor"
value="<?php echo $datos['autor'] ?? ''; ?>">
<?php if(isset($errores['autor'])): ?>
<p class="error"><?php echo $errores['autor']; ?></p>
<?php endif; ?>

<input type="text" name="editorial" placeholder="Editorial"
value="<?php echo $datos['editorial'] ?? ''; ?>">

<input type="number" name="anio" placeholder="Año"
value="<?php echo $datos['anio'] ?? ''; ?>">
<?php if(isset($errores['anio'])): ?>
<p class="error"><?php echo $errores['anio']; ?></p>
<?php endif; ?>

<input type="text" name="isbn" placeholder="ISBN"
value="<?php echo $datos['isbn'] ?? ''; ?>">
<?php if(isset($errores['isbn'])): ?>
<p class="error"><?php echo $errores['isbn']; ?></p>
<?php endif; ?>

<input type="text" name="genero" placeholder="Género"
value="<?php echo $datos['genero'] ?? ''; ?>">

<input type="number" name="paginas" placeholder="Número de páginas"
value="<?php echo $datos['paginas'] ?? ''; ?>">

<input type="text" name="idioma" placeholder="Idioma"
value="<?php echo $datos['idioma'] ?? ''; ?>">

<input type="number" name="ejemplares" placeholder="Ejemplares"
value="<?php echo $datos['ejemplares'] ?? ''; ?>">
<?php if(isset($errores['ejemplares'])): ?>
<p class="error"><?php echo $errores['ejemplares']; ?></p>
<?php endif; ?>

<input type="text" name="ubicacion" placeholder="Ubicación"
value="<?php echo $datos['ubicacion'] ?? ''; ?>">

<button type="submit">Guardar</button>

</form>

<script src="build/js/app.js"></script>

</body>
</html>