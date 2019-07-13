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

create table if not exists team(
	id_team int not null primary key,
    name_team varchar(45) unique not null
);

create table if not exists player(
	id_team int not null,
	id_player int not null,
    name_player varchar(45) unique not null,
    constraint pk_playerM primary key(id_player, id_team),
    constraint fk_playerM foreign key(id_team)
        references team(id_team)
);

create table if not exists card_player(
    id_user int not null,
    id_team int not null,
    id_player int not null,
    amount int not null,
    constraint pk_cardCM primary key(id_user, id_team, id_player),
    constraint fk_userCM foreign key(id_user)
        references user(id_user),
	constraint fk_teamCM foreign key(id_team)
        references team(id_team),
	constraint fk_playerCM foreign key(id_player)
        references player(id_player)
);

INSERT INTO team(id_team, name_team) VALUES
	(1,"Eminem (Marshall Bruce Mathers III)");
    
INSERT INTO player(id_team, id_player, name_player) VALUES
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