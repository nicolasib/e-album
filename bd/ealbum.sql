create database if not exists ealbum;
use ealbum;

create table if not exists user(
	id_user int not null auto_increment,
    nome_user varchar(45) not null,
    email_user varchar(45) not null,
    senha_user varchar(45) not null,
    imagem_user varchar(45) not null,
    constraint pk_user primary key (id_user)
);