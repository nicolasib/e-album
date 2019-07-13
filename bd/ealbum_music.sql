drop database if exists ealbum;
create database if not exists ealbum;
use ealbum;

create table if not exists user(
	id_user int not null auto_increment primary key,
    name_user varchar(45) unique not null,
    email_user varchar(45) unique not null,
    pass_user varchar(45) not null
);

create table if not exists album(
	id_album int not null primary key,
    name_album varchar(45) unique not null
);

create table if not exists card_album(
    id_user int not null,
    id_album int not null,
    amount int not null,
    constraint pk_cardCA primary key(id_user, id_album),
    constraint fk_userCA foreign key(id_user)
        references user(id_user),
	constraint fk_albumCA foreign key(id_album)
        references album(id_album)
);

create table if not exists singer(
	id_singer int not null primary key,
    name_singer varchar(45) unique not null
);

create table if not exists music(
	id_singer int not null,
	id_music int not null,
    name_music varchar(45) unique not null,
    constraint pk_musicM primary key(id_music, id_singer),
    constraint fk_musicM foreign key(id_singer)
        references singer(id_singer)
);

create table if not exists card_music(
    id_user int not null,
    id_singer int not null,
    id_music int not null,
    amount int not null,
    constraint pk_cardCM primary key(id_user, id_singer, id_music),
    constraint fk_userCM foreign key(id_user)
        references user(id_user),
	constraint fk_singerCM foreign key(id_singer)
        references singer(id_singer),
	constraint fk_musicCM foreign key(id_music)
        references music(id_music)
);

INSERT INTO singer(id_singer, name_singer) VALUES
	(1,"Eminem (Marshall Bruce Mathers III)");
    
INSERT INTO music(id_singer, id_music, name_music) VALUES
	(1, 1,"Lose Yourself"),
    (1, 2,"Till I Collapse"),
    (1, 3,"The Real Slim Shady"),
    (1, 4,"My Name Is"),
    (1, 5,"Not Afraid"),
    (1, 6,"Rap God"),
    (1, 7,"Without Me"),
    (1, 8,"Space Bound"),
    (1, 9,"Role Model"),
    (1, 10,"Beautiful");