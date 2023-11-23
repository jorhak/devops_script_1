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

CREATE TABLE IF NOT EXISTS reserva
(
    id int auto_increment,
    id_usuario int not null,
    usuario_nombre varchar(50) not null,
    usuario_correo varchar(50) not null,
    telefono varchar(8) not null,
    direccion varchar(50) not null,
    id_paquete int not null,
    adultos int(2),
    ninos int(2),
    fecha date not null,
    primary key(id, id_usuario),
    foreign key(id_usuario) references usuario(id),
    foreign key(id_paquete) references paquete(id)
);
