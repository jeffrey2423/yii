CREATE DATABASE votacionesApp;

USE votacionesApp;

CREATE TABLE votaciones_usuario(
	id_user int auto_increment,
    nombre varchar(255) not null,
    apellido varchar(255) not null,
    usuario varchar(255) not null,
    clave text(500) not null,
    fecha_creacion TIMESTAMP default CURRENT_TIMESTAMP,
    CONSTRAINT PK_Person PRIMARY KEY (id_user)  
);

create table votaciones_roles(
    id_rol int auto_increment,
    nombre varchar(255) not null,
    descripcion varchar(255) not null,
    fecha_creacion TIMESTAMP default CURRENT_TIMESTAMP,
    CONSTRAINT PK_Rol PRIMARY KEY (id_rol)
);

create table votaciones_permisos(
    id_permiso int auto_increment,
    rol int,
    nombre varchar(255) not null,
    descripcion varchar(255) not null,
    fecha_creacion TIMESTAMP default CURRENT_TIMESTAMP,
    CONSTRAINT PK_Permiso PRIMARY KEY (id_permiso),
    CONSTRAINT FK_rol FOREIGN KEY (rol) REFERENCES votaciones_roles(id_rol)
    ON UPDATE CASCADE
    ON DELETE CASCADE 
);

create table votaciones_usuario_extendido(
    id_user int,
    id_rol int,
    CONSTRAINT FK_tipo FOREIGN KEY (id_rol) REFERENCES votaciones_roles(id_rol)
    ON UPDATE CASCADE
    ON DELETE CASCADE,
    CONSTRAINT FK_user FOREIGN KEY (id_user) REFERENCES votaciones_usuario(id_user)
    ON UPDATE CASCADE
    ON DELETE CASCADE
);

create table votaciones_candidato(
    id_candidato int auto_increment,
    nombre varchar(255) not null,
    apellido varchar(255) not null,
    tipo varchar(255) not null,
    fecha_creacion TIMESTAMP default CURRENT_TIMESTAMP,
    CONSTRAINT PK_Person PRIMARY KEY (id_candidato)
);

create table votaciones_votos(
    id_candidato int,
    cantidad_voto int default 0,
    CONSTRAINT FK_candidato FOREIGN KEY (id_candidato) REFERENCES votaciones_candidato(id_candidato)
    ON UPDATE CASCADE
    ON DELETE CASCADE   
);

/*trigger para llenar tabla votaciones con el candidato nuevo y sus votos en 0*/
delimiter &&
CREATE TRIGGER poblar_votos after INSERT ON votaciones_candidato
FOR each ROW
BEGIN
INSERT INTO votaciones_votos VALUES(NEW.id_candidato,0);
end&&
delimiter ;

insert into votaciones_candidato VALUES('prueba','NOW()',1,'prueba','contralor');
