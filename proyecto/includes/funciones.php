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

// ===============================
// VALIDAR LIBRO (USADA EN CREAR Y EDITAR)
// ===============================
function validar_libro($datos){

    $errores = [];

    $titulo = limpiar_datos($datos['titulo']);
    $autor = limpiar_datos($datos['autor']);
    $isbn = limpiar_datos($datos['isbn']);
    $anio = (int)$datos['anio'];
    $ejemplares = (int)$datos['ejemplares'];

    $anioActual = date("Y");

    if(strlen($titulo) < 3){
        $errores['titulo'] = "El título debe tener al menos 3 caracteres.";
    }

    if(strlen($autor) < 3){
        $errores['autor'] = "El autor debe tener al menos 3 caracteres.";
    }

    if($anio < 1000 || $anio > $anioActual){
        $errores['anio'] = "El año ingresado es inválido.";
    }

    if(!ctype_digit($isbn) || strlen($isbn) < 10 || strlen($isbn) > 13){
    $errores['isbn'] = "El ISBN debe contener solo números y tener entre 10 y 13 dígitos.";
}

    if($ejemplares <= 0){
        $errores['ejemplares'] = "El número de ejemplares debe ser mayor a 0.";
    }

    return $errores;
}

// ===============================
// CREAR LIBRO
// ===============================
function crear_libro($datos, &$errores){

    global $conexion;

    $errores = validar_libro($datos);

    if(!empty($errores)){
        return false;
    }

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

    $stmt = $conexion->prepare("INSERT INTO libros 
    (titulo, autor, editorial, anio_publicacion, isbn, genero, numero_paginas, idioma, ejemplares, ubicacion)
    VALUES (?,?,?,?,?,?,?,?,?,?)");

    $stmt->bind_param("sssissisis",
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

// ===============================
// ELIMINAR LIBRO
// ===============================
function eliminar_libro($id){
    global $conexion;

    $stmt = $conexion->prepare("DELETE FROM libros WHERE id = ?");
    $stmt->bind_param("i", $id);
    return $stmt->execute();
}

// ===============================
// OBTENER LIBRO
// ===============================
function obtener_libro($id){
    global $conexion;

    $stmt = $conexion->prepare("
        SELECT 
            id,
            titulo,
            autor,
            editorial,
            anio_publicacion AS anio,
            isbn,
            genero,
            numero_paginas AS paginas,
            idioma,
            ejemplares,
            ubicacion
        FROM libros
        WHERE id = ?
    ");

    $stmt->bind_param("i", $id);
    $stmt->execute();
    return $stmt->get_result()->fetch_assoc();
}

// ===============================
// ACTUALIZAR LIBRO
// ===============================
function actualizar_libro($datos, &$errores){

    global $conexion;

    $errores = validar_libro($datos);

    if(!empty($errores)){
        return false;
    }

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
    $id = (int)$datos['id'];

    $stmt = $conexion->prepare("UPDATE libros SET 
        titulo=?, autor=?, editorial=?, anio_publicacion=?, isbn=?, genero=?, numero_paginas=?, idioma=?, ejemplares=?, ubicacion=? 
        WHERE id=?");

    $stmt->bind_param("sssissisisi",
        $titulo,
        $autor,
        $editorial,
        $anio,
        $isbn,
        $genero,
        $paginas,
        $idioma,
        $ejemplares,
        $ubicacion,
        $id
    );

    return $stmt->execute();
}
?>