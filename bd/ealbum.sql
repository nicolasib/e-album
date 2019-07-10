create database if not exists ealbum;
use ealbum;

create table if not exists user(
	id_user int not null auto_increment,
    name_user varchar(45) unique not null,
    email_user varchar(45) unique not null,
    pass_user varchar(45) not null,
    constraint pk_user primary key (id_user)
);