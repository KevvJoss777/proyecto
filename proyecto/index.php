<?php
require 'includes/funciones.php';
$libros = obtener_libros();
?>

<!DOCTYPE html>
<html>
<head>
<title>Biblioteca</title>
<link rel="stylesheet" href="build/css/style.css">
</head>
<body>

<h1>Registro de Libros</h1>
<a href="crear.php">Agregar Libro</a>

<table>
<tr>
<th>ID</th>
<th>Título</th>
<th>Autor</th>
<th>Acciones</th>
</tr>

<?php while($libro = $libros->fetch_assoc()): ?>
<tr>
<td><?php echo $libro['id']; ?></td>
<td><?php echo $libro['titulo']; ?></td>
<td><?php echo $libro['autor']; ?></td>
<td>
<a href="editar.php?id=<?php echo $libro['id']; ?>">Editar</a>
<a href="eliminar.php?id=<?php echo $libro['id']; ?>">Eliminar</a>
</td>
</tr>
<?php endwhile; ?>

</table>
</body>
</html>