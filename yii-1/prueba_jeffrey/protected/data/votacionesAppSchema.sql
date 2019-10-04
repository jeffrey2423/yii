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

/*trigger para asignar el rol de votante y sus respectivos permisos por defecto a un usuario*/
delimiter &&
CREATE TRIGGER poblar_roles after INSERT ON votaciones_usuario
FOR each ROW
BEGIN
  DECLARE idRol INT;
  SET idRol = (SELECT id_Rol FROM votaciones_roles WHERE nombre = 'admin');
INSERT INTO votaciones_usuario_extendido VALUES(NEW.id_user,idRol);
end&&
delimiter ;

insert into votaciones_candidato VALUES('prueba','NOW()',1,'prueba','contralor');
INSERT INTO `testdrive`.`votaciones_roles` (`id_rol`, `nombre`, `descripcion`, `fecha_creacion`) VALUES (NULL, 'admin', 'administrador del sitio', CURRENT_TIMESTAMP), (NULL, 'votante', 'solo podra efectuar el voto', CURRENT_TIMESTAMP)
insert into votaciones_permisos VALUES(1,1,'gestion.votantes','prodra realizar la gestion de los usuarios'),(2,2,'efectuar.voto','podra elegir un candidato');

/*consulta para obtener el usuario y el rol de quien inicia sesion*/
select A.id_user, A.nombre, A.apellido, A.usuario, A.clave, B.id_rol, D.nombre as nombre_rol, C.id_permiso, C.nombre as nombre_permiso, C.descripcion as desc_permiso from votaciones_usuario as A inner join votaciones_usuario_extendido as B on A.id_user = B.id_user inner join votaciones_permisos as C on B.id_rol = C.rol inner join votaciones_roles as D on C.rol = D.id_rol
/*consulta para obtener el usuario y el rol de quien inicia sesion con parametro*/

select A.id_user, A.nombre, A.apellido, A.usuario, A.clave, B.id_rol, D.nombre as nombre_rol, C.id_permiso, C.nombre as nombre_permiso, C.descripcion as desc_permiso from

(votaciones_usuario as A inner join votaciones_usuario_extendido as B on A.id_user = B.id_user
inner join votaciones_permisos as C on B.id_rol = C.rol inner join votaciones_roles as D on C.rol = D.id_rol)

where A.usuario = 'prueba';