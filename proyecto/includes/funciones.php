<?php
require 'database.php';

// Obtener libros
function obtener_libros(){
    global $conexion;
    $sql = "SELECT * FROM libros";
    return $conexion->query($sql);
}

// Crear libro
function crear_libro($datos){
    global $conexion;

    $stmt = $conexion->prepare("INSERT INTO libros 
    (titulo, autor, editorial, anio_publicacion, isbn, genero, numero_paginas, idioma, ejemplares, ubicacion)
    VALUES (?,?,?,?,?,?,?,?,?,?)");

    $stmt->bind_param("ssssssssss",
        $datos['titulo'],
        $datos['autor'],
        $datos['editorial'],
        $datos['anio'],
        $datos['isbn'],
        $datos['genero'],
        $datos['paginas'],
        $datos['idioma'],
        $datos['ejemplares'],
        $datos['ubicacion']
    );

    return $stmt->execute();
}

// Eliminar libro
function eliminar_libro($id){
    global $conexion;
    $sql = "DELETE FROM libros WHERE id = $id";
    return $conexion->query($sql);
}

// Obtener libro por ID
function obtener_libro($id){
    global $conexion;
    $sql = "SELECT * FROM libros WHERE id = $id";
    return $conexion->query($sql)->fetch_assoc();
}

// Actualizar libro
function actualizar_libro($datos){
    global $conexion;

    $stmt = $conexion->prepare("UPDATE libros SET 
    titulo=?, autor=?, editorial=?, anio_publicacion=?, isbn=?, genero=?, numero_paginas=?, idioma=?, ejemplares=?, ubicacion=? 
    WHERE id=?");

    $stmt->bind_param("ssssssssssi",
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