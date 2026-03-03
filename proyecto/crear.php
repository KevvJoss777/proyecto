<?php
require 'includes/funciones.php';

$errores = [];
$datos = [];

if($_SERVER['REQUEST_METHOD'] === 'POST'){
    $datos = $_POST;

    $resultado = crear_libro($_POST, $errores);

    if(empty($errores)){
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

<?php if(!empty($errores)): ?>
    <div class="error">
        <?php foreach($errores as $error): ?>
            <p><?php echo $error; ?></p>
        <?php endforeach; ?>
    </div>
<?php endif; ?>

<form method="POST">

    <input type="text" name="titulo" placeholder="Título"
    value="<?php echo $datos['titulo'] ?? ''; ?>">

    <input type="text" name="autor" placeholder="Autor"
    value="<?php echo $datos['autor'] ?? ''; ?>">

    <input type="text" name="editorial" placeholder="Editorial"
    value="<?php echo $datos['editorial'] ?? ''; ?>">

    <input type="number" name="anio" placeholder="Año"
    value="<?php echo $datos['anio'] ?? ''; ?>">

    <input type="text" name="isbn" placeholder="ISBN"
    value="<?php echo $datos['isbn'] ?? ''; ?>">

    <input type="text" name="genero" placeholder="Género"
    value="<?php echo $datos['genero'] ?? ''; ?>">

    <input type="number" name="paginas" placeholder="Número de páginas"
    value="<?php echo $datos['paginas'] ?? ''; ?>">

    <input type="text" name="idioma" placeholder="Idioma"
    value="<?php echo $datos['idioma'] ?? ''; ?>">

    <input type="number" name="ejemplares" placeholder="Ejemplares"
    value="<?php echo $datos['ejemplares'] ?? ''; ?>">

    <input type="text" name="ubicacion" placeholder="Ubicación"
    value="<?php echo $datos['ubicacion'] ?? ''; ?>">

    <button type="submit">Guardar</button>

</form>

</body>
</html>