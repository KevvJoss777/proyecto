<?php
require 'includes/funciones.php';

$errores = [];
$datos = [];

// Verificar que exista ID
if(!isset($_GET['id'])){
    header("Location: index.php");
    exit;
}

$id = (int)$_GET['id'];
$libro = obtener_libro($id);

if(!$libro){
    header("Location: index.php");
    exit;
}

// Si se envía el formulario
if($_SERVER['REQUEST_METHOD'] === 'POST'){
    $datos = $_POST;
    $datos['id'] = $id;

    $resultado = actualizar_libro($datos, $errores);

    if(empty($errores)){
        header("Location: index.php");
        exit;
    }
} else {
    $datos = $libro;
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

    <button type="submit">Actualizar</button>

</form>

</body>
</html>