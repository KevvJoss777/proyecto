<?php
require 'database.php';

// Limpiar datos
function limpiar_datos($dato){
    return htmlspecialchars(trim($dato));
}

// Obtener libros
function obtener_libros(){
    global $conexion;
    $sql = "SELECT * FROM libros";
    return $conexion->query($sql);
}

// Crear libro
function crear_libro($datos, &$errores){
    global $conexion;

    $titulo = limpiar_datos($datos['titulo']);
    $autor = limpiar_datos($datos['autor']);
    $editorial = limpiar_datos($datos['editorial']);
    $anio = (int)$datos['anio'];
    $isbn = limpiar_datos($datos['isbn']);
    $genero = limpiar_datos($datos['genero']);
    $paginas = (int)$datos['paginas'];
    $idioma = limpiar_datos($datos['idioma']);
    $ejemplares = (int)$datos['ejemplares'];
    $ubicacion = limpiar_datos($datos['ubicacion']);

    $anioActual = date("Y");

    // Validaciones
    if(strlen($titulo) < 3){
        $errores[] = "El título debe tener al menos 3 caracteres.";
    }

    if(strlen($autor) < 3){
        $errores[] = "El autor debe tener al menos 3 caracteres.";
    }

    if($anio < 1000 || $anio > $anioActual){
        $errores[] = "El año ingresado es inválido.";
    }

    if(!ctype_digit($isbn) || strlen($isbn) < 10){
    $errores[] = "El ISBN debe contener solo números y al menos 10 dígitos.";
}

    if($ejemplares <= 0){
        $errores[] = "El número de ejemplares debe ser mayor a 0.";
    }

    if(!empty($errores)){
        return false;
    }

    $stmt = $conexion->prepare("INSERT INTO libros 
    (titulo, autor, editorial, anio_publicacion, isbn, genero, numero_paginas, idioma, ejemplares, ubicacion)
    VALUES (?,?,?,?,?,?,?,?,?,?)");

    $stmt->bind_param("sssisssisi",
        $titulo,
        $autor,
        $editorial,
        $anio,
        $isbn,
        $genero,
        $paginas,
        $idioma,
        $ejemplares,
        $ubicacion
    );

    return $stmt->execute();
}

// Eliminar libro
function eliminar_libro($id){
    global $conexion;

    $stmt = $conexion->prepare("DELETE FROM libros WHERE id = ?");
    $stmt->bind_param("i", $id);
    return $stmt->execute();
}

// Obtener libro por ID
function obtener_libro($id){
    global $conexion;

    $stmt = $conexion->prepare("SELECT * FROM libros WHERE id = ?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
    return $stmt->get_result()->fetch_assoc();
}

// Actualizar libro
function actualizar_libro($datos){
    global $conexion;

    $stmt = $conexion->prepare("UPDATE libros SET 
    titulo=?, autor=?, editorial=?, anio_publicacion=?, isbn=?, genero=?, numero_paginas=?, idioma=?, ejemplares=?, ubicacion=? 
    WHERE id=?");

    $stmt->bind_param("sssisssissi",
        $datos['titulo'],
        $datos['autor'],
        $datos['editorial'],
        $datos['anio'],
        $datos['isbn'],
        $datos['genero'],
        $datos['paginas'],
        $datos['idioma'],
        $datos['ejemplares'],
        $datos['ubicacion'],
        $datos['id']
    );

    return $stmt->execute();
}
?>