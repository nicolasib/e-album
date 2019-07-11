drop database if exists ealbum;
create database if not exists ealbum;
use ealbum;

create table if not exists user(
	id_user int not null auto_increment primary key,
    name_user varchar(45) unique not null,
    email_user varchar(45) unique not null,
    pass_user varchar(45) not null
);

create table if not exists stadium(
	id_stadium int not null primary key,
    name_stadium varchar(45) unique not null
);

create table if not exists card_stadium(
    id_user int not null,
    id_stadium int not null,
    amount int not null,
    constraint pk_cardCS primary key(id_user, id_stadium),
    constraint fk_userCS foreign key(id_user)
        references user(id_user),
	constraint fk_stadiumCS foreign key(id_stadium)
        references stadium(id_stadium)
);

create table if not exists team(
	id_team int not null primary key,
    name_team varchar(45) unique not null
);

create table if not exists player(
	id_team int not null,
	id_player int not null,
    name_player varchar(45) unique not null,
    constraint pk_playerP primary key(id_player, id_team),
    constraint fk_teamP foreign key(id_team)
        references team(id_team)
);

create table if not exists card_player(
    id_user int not null,
    id_team int not null,
    id_player int not null,
    amount int not null,
    constraint pk_cardCP primary key(id_user, id_team, id_player),
    constraint fk_userCP foreign key(id_user)
        references user(id_user),
	constraint fk_teamCP foreign key(id_team)
        references team(id_team),
	constraint fk_playerCP foreign key(id_player)
        references player(id_player)
);