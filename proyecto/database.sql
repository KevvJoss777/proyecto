CREATE DATABASE biblioteca;
USE biblioteca;

CREATE TABLE libros (
    id INT AUTO_INCREMENT PRIMARY KEY,
    titulo VARCHAR(150) NOT NULL,
    autor VARCHAR(100) NOT NULL,
    editorial VARCHAR(100),
    anio_publicacion INT,
    isbn VARCHAR(20),
    genero VARCHAR(50),
    numero_paginas INT,
    idioma VARCHAR(50),
    ejemplares INT,
    ubicacion VARCHAR(100),
    fecha_registro TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

INSERT INTO libros 
(titulo, autor, editorial, anio_publicacion, isbn, genero, numero_paginas, idioma, ejemplares, ubicacion)
VALUES
('Cien Años de Soledad','Gabriel García Márquez','Sudamericana',1967,'9780307474728','Novela',417,'Español',5,'Estante A1'),
('Don Quijote de la Mancha','Miguel de Cervantes','Francisco de Robles',1605,'9788420412146','Novela',863,'Español',3,'Estante B2'),
('El Principito','Antoine de Saint-Exupéry','Reynal & Hitchcock',1943,'9780156012195','Fábula',96,'Francés',4,'Estante C3'),
('1984','George Orwell','Secker & Warburg',1949,'9780451524935','Distopía',328,'Inglés',6,'Estante D4'),
('La Odisea','Homero','Grecia Antigua',-700,'9780140268867','Épico',500,'Griego',2,'Estante E5');
