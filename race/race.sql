drop database if exists Race;

create database Race;
use Race;

create table races(
				raceId int AUTO_INCREMENT primary key NOT NULL,
				raceName varchar(255) NOT NULL,
				startDate int(11) NOT NULL,
				location varchar(255) NOT NULL,
				length varchar(255) NOT NULL
);


insert into races(raceName,startDate,location,length)values ('Beat the Heat',1448727421,'Phoenix',' 5 miles');
insert into races(raceName,startDate,location,length)values ('Snowmathon',1448767345,'Atlanta',' 10 miles');
insert into races(raceName,startDate,location,length)values ('Escape',1448729878,'Indy',' 25 miles');
insert into races(raceName,startDate,location,length)values ('Always the Best',1448778009,'chandler',' 5 miles');

create table racers(
			racerId int AUTO_INCREMENT primary key not null,
			age int not null,
			name varchar(255) not null

);	

insert into racers (age,name) values (30,'Brian');
insert into racers (age,name) values (26,'Sean');
insert into racers (age,name) values (36,'Daniel');
insert into racers (age,name) values (28,'Chris');


	create table raceRacers(
		raceId int not null,
		racerId int not null

		);
	insert into raceRacers (raceId,racerId) values (1,2);
	insert into raceRacers (raceId,racerId) values (1,3);
	insert into raceRacers (raceId,racerId) values (1,4);
	insert into raceRacers (raceId,racerId) values (3,2);
	insert into raceRacers (raceId,racerId) values (2,2);
	insert into raceRacers (raceId,racerId) values (2,2);
