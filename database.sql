CREATE TABLE usuario
(
    id int auto_increment,
    nombre varchar(50) not null,
    correo varchar(50) not null,
    usuario varchar(50) not null,
    contrasena varchar(255) not null,
    primary key(id)
);