create database fakeinstagram;

use fakeinstagram;

create table usuarios(
	id int primary key auto_increment,
    nome varchar(50) not null,
    sobrenome varchar(100) not null,
    email varchar(100) not null unique,
    senha varchar(100) not null 
);

create table posts(
	id int primary key auto_increment,
    img varchar(500) not null,
    descricao varchar(300) not null,
    id_usuario int not null,
    foreign key (id_usuario) references usuarios(id) 
);
