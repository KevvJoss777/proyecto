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

<?php if($libros->num_rows > 0): ?>

<?php while($libro = $libros->fetch_assoc()): ?>

<tr>

<td><?php echo htmlspecialchars($libro['id']); ?></td>

<td><?php echo htmlspecialchars($libro['titulo']); ?></td>

<td><?php echo htmlspecialchars($libro['autor']); ?></td>

<td>

<a href="editar.php?id=<?php echo $libro['id']; ?>">Editar</a>

<a href="eliminar.php?id=<?php echo $libro['id']; ?>"
onclick="return confirm('¿Seguro que deseas eliminar este libro?');">
Eliminar
</a>

</td>

</tr>

<?php endwhile; ?>

<?php else: ?>

<tr>
<td colspan="4">No hay libros registrados</td>
</tr>

<?php endif; ?>

</table>

</body>
</html>