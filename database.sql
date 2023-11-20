CREATE TABLE IF NOT EXISTS usuario
(
    id int auto_increment,
    nombre varchar(50) not null,
    correo varchar(50) not null,
    usuario varchar(50) not null,
    contrasena varchar(255) not null,
    primary key(id)
);

CREATE TABLE IF NOT EXISTS paquete
(
    id int auto_increment,
    nombre varchar(50) not null,
    descripcion varchar(50) not null,
    dias varchar(2) not null,
    precio varchar(4) not null,
    destino varchar(50) not null,
    foto varchar(255) not null,
    primary key(id)
);