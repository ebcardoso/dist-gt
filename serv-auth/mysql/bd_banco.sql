drop database bd_banco;
create database bd_banco;

use bd_banco;

create table conta (
	id_conta int not null primary key auto_increment,
	user_titular varchar(30) not null,
	saldo float
);

create table movimentacao (
	id_conta int not null,
	id_movimentacao int not null primary key auto_increment,
	descricao varchar(40),
	valor float,
	dia datetime
);
