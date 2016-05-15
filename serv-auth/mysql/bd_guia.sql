drop database bd_guia;
create database bd_guia;
use bd_guia;

create table cidade (
	id_cidade int primary key auto_increment,
	nome varchar(30)
);

create table passeio (
	id_cidade int not null,
	id_passeio int primary key auto_increment,
	nome varchar(30)
);

create table ponto (
	id_ponto int primary key auto_increment,
	nome varchar(50)
);

create table ponto_passeio (
	id_ponto int not null,
	id_passeio int not null
);

insert into cidade (nome) values ('Natal');
	insert into passeio (id_cidade, nome) values (1, 'Praias de Natal');
		insert into ponto (nome) values ('Fortaleza dos Reis Magos');
		insert into ponto (nome) values ('Praia do Forte');
		insert into ponto (nome) values ('Praia do Meio');
		insert into ponto (nome) values ('Praia dos Artistas');
		insert into ponto (nome) values ('Praia de Ponta Negra');
		insert into ponto (nome) values ('Morro do Careca');
			insert into ponto_passeio (id_passeio, id_ponto) values (1, 1);
			insert into ponto_passeio (id_passeio, id_ponto) values (1, 2);
			insert into ponto_passeio (id_passeio, id_ponto) values (1, 3);
			insert into ponto_passeio (id_passeio, id_ponto) values (1, 4);
			insert into ponto_passeio (id_passeio, id_ponto) values (1, 5);
			insert into ponto_passeio (id_passeio, id_ponto) values (1, 6);

insert into cidade (nome) values ('Rio de Janeiro');
	insert into passeio (id_cidade, nome) values (2, 'Tuor pelo Rio');
		insert into ponto (nome) values ('Praia de Copacabana');
		insert into ponto (nome) values ('Maracanã');
		insert into ponto (nome) values ('Cristo Redentor');
		insert into ponto (nome) values ('Morro do Alemão');
			insert into ponto_passeio (id_passeio, id_ponto) values (2, 7);
			insert into ponto_passeio (id_passeio, id_ponto) values (2, 8);
			insert into ponto_passeio (id_passeio, id_ponto) values (2, 9);
			insert into ponto_passeio (id_passeio, id_ponto) values (2, 10);

insert into cidade (nome) values ('Berlim');
insert into cidade (nome) values ('Gramado');
insert into cidade (nome) values ('Miami');
insert into cidade (nome) values ('Nova York');
insert into cidade (nome) values ('Paris');
insert into cidade (nome) values ('Roma');
insert into cidade (nome) values ('São Paulo');
insert into cidade (nome) values ('Tokyo');
