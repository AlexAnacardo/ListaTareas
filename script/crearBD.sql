create database if not exists dbListaTareas;
use dbListaTareas;

create user if not exists 'usuarioTareas'@'%' identified by 'paso';

grant all privileges on dbListaTareas.* to 'usuarioTareas'@'%';

create table if not exists Usuarios(
    CodUsuario varchar(10) primary key,
    Nombre varchar(100),
    contraseña varchar(100)
)engine=innodb;

create table if not exists Tareas(
    CodTarea varchar(10),
    CodUsuario varchar(10),
    DescripcionTarea varchar(100),
    FechaCreacion datetime,
    FechaTareaRealizada datetime,
    PRIMARY KEY (CodTarea, CodUsuario),
    FOREIGN KEY (CodUsuario) references Usuarios(CodUsuario) on update cascade on delete cascade
)engine=innodb;

