create database casino;

create table tUsuarios (Id INT NOT NULL AUTO_INCREMENT, Nombre varchar(100) not null, Edad int not null, Usuario varchar(50) not null, Password varchar(255) not null, PRIMARY KEY(Id)) engine=innodb;

create table tJuegos (Id INT NOT NULL AUTO_INCREMENT, Nombre varchar(100) not null, PRIMARY KEY(Id)) engine=innodb;

create table tSaldos (Id INT NOT NULL AUTO_INCREMENT, IdUsuario int not null,Saldo double not null, Fecha DateTime not null, PRIMARY KEY(Id), index Id_Usuario (IdUsuario), foreign key(IdUsuario) references tUsuarios(Id) on delete cascade) engine=innodb;

 insert into tjuegos (Nombre) values ('ruleta'); 
 insert into tjuegos (Nombre) values ('Sorteo');
 insert into tjuegos (Nombre) values ('Black Jack');