drop database if exists games;
create database games;
use games;

create table game(
	id int auto_increment primary key ,
	name varchar(255) not null,
	year int
);

insert into game(name,year) values ('Halo',2008);
insert into game(name,year) values ('Mass Effect',2005);
insert into game(name,year) values ('Contra',1986);
insert into game(name,year) values ('Super Mario',1985);
insert into game(name,year) values ('Castlevania',1943);
insert into game(name,year) values ('Zelda',1998);


