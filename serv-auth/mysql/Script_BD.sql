drop database bd_auth;
create database bd_auth;
use bd_auth;

create table cliente (
	id_produto int primary key auto_increment,
	nome_cliente varchar(40) not null,
	username_cliente varchar(40) not null unique,
	senha_cliente varchar(40) not null
);

insert into cliente (nome_cliente, username_cliente, senha_cliente) values ('Augusto Matheus Pinheiro Damasceno', 'augusto.matheus', '2009035976');
insert into cliente (nome_cliente, username_cliente, senha_cliente) values ('Bruno Leite de Almeida',             'bruno.leite',     '2012912268');
insert into cliente (nome_cliente, username_cliente, senha_cliente) values ('Elísio Breno Garcia Cardoso',        'elisio.breno',    '2012912339');
insert into cliente (nome_cliente, username_cliente, senha_cliente) values ('Felipe Cortez de Sá',                'felipe.cortez',   '2012912357');
insert into cliente (nome_cliente, username_cliente, senha_cliente) values ('Graco Babeuf Vieira Silva',          'graco.babeuf',    '2012912393');
insert into cliente (nome_cliente, username_cliente, senha_cliente) values ('Joao Pinto de Campos Neto',          'joao.pinto',      '200718266');
insert into cliente (nome_cliente, username_cliente, senha_cliente) values ('João Ricardo Tavares Gadelha',       'joao.ricardo',    '2009035828');





drop database bd_guia;
create database bd_guia;
use bd_guia;

create table cidade (
	id_cidade int primary key auto_increment,
	nome varchar(30)
);

create table guia (
	id_guia int primary key auto_increment,
	nome varchar (30) not null,
	email varchar (50) not null,
	cidade varchar (30) not null
);

create table passeio (
	id_passeio int primary key auto_increment,
	id_cidade int not null,
	id_guia int not null,
	nome varchar(30),
	vigenciaInicio date,
	vigenciaFinal date,
	horaInicial time,
	horaFinal time,
	preco float
);
alter table passeio
add constraint fk_passeio_cidade foreign key (id_cidade) references cidade (id_cidade) on update cascade on delete cascade;
alter table passeio
add constraint fk_passeio_guia foreign key (id_guia) references guia (id_guia) on update cascade on delete cascade;

create table ponto (
	id_ponto int primary key auto_increment,
	nome varchar(50)
);

create table ponto_passeio (
	id_ponto int not null,
	id_passeio int not null
);
alter table ponto_passeio
add constraint fk_pp_ponto foreign key (id_ponto) references ponto (id_ponto) on update cascade on delete cascade;
alter table passeio
add constraint fk_pp_passeio foreign key (id_passeio) references passeio (id_passeio) on update cascade on delete cascade;

create table compra (
	id_compra int primary key auto_increment,
	id_passeio int not null,
	username varchar(30)
);
alter table compra
add constraint fk_compra_passeio foreign key (id_passeio) references passeio (id_passeio) on update cascade on delete cascade;

insert into guia (nome, cidade, email) values ("Carlos Maia", "Natal", "carlos@maia.com");
insert into guia (nome, cidade, email) values ("Maria Luiza", "Natal", "maria@luiza.com");
insert into guia (nome, cidade, email) values ("Marco Rossi", "Rio de Janeiro", "marco@rossi.com");
insert into guia (nome, cidade, email) values ("Lucas Alves", "Rio de Janeiro", "lucas@alves.com");
insert into guia (nome, cidade, email) values ("John Snow", "Miami", "john@snow.com");
insert into guia (nome, cidade, email) values ("Mary Jane", "Miami", "mary@jane.com");
insert into guia (nome, cidade, email) values ("Frank Underwood", "Nova York", "frank@underwood.com");
insert into guia (nome, cidade, email) values ("Mac Taylor", "Nova York", "mac@taylor.com");
insert into guia (nome, cidade, email) values ("Matthieu Vermond", "Paris", "matthieu@vermond.com");
insert into guia (nome, cidade, email) values ("Samir Nasri", "Paris", "samir@nasri.com");

insert into cidade (nome) values ('Natal');
	insert into passeio (id_guia, id_cidade, nome, preco, vigenciaInicio, vigenciaFinal, horaInicial, horaFinal) values (1, 1, 'Praias de Natal', 500, "2016-06-01", "2016-06-30", '14:00:00', '18:00:00');
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

	insert into passeio (id_guia, id_cidade, nome, preco, vigenciaInicio, vigenciaFinal, horaInicial, horaFinal) values (2, 1, 'Shoppings de Natal', 250, "2016-05-31", "2016-07-15", "19:00:00", "23:00:00");
		insert into ponto (nome) values ('Fortaleza dos Reis Magos');
		insert into ponto (nome) values ('Norte Shopping');
		insert into ponto (nome) values ('Midway Mall');
		insert into ponto (nome) values ('Portugal Center');
		insert into ponto (nome) values ('Praia Shopping');
			insert into ponto_passeio (id_passeio, id_ponto) values (2, 7);
			insert into ponto_passeio (id_passeio, id_ponto) values (2, 8);
			insert into ponto_passeio (id_passeio, id_ponto) values (2, 9);
			insert into ponto_passeio (id_passeio, id_ponto) values (2, 10);

insert into cidade (nome) values ('Rio de Janeiro');
	insert into passeio (id_guia, id_cidade, nome, preco, vigenciaInicio, vigenciaFinal, horaInicial, horaFinal) values (3, 2, 'Tuor pelo Rio', 300, "2016-06-01", "2016-06-30", "08:00:00", "14:00:00");
		insert into ponto (nome) values ('Praia de Copacabana');
		insert into ponto (nome) values ('Maracanã');
		insert into ponto (nome) values ('Cristo Redentor');
		insert into ponto (nome) values ('Morro do Alemão');
			insert into ponto_passeio (id_passeio, id_ponto) values (3, 11);
			insert into ponto_passeio (id_passeio, id_ponto) values (3, 12);
			insert into ponto_passeio (id_passeio, id_ponto) values (3, 13);
			insert into ponto_passeio (id_passeio, id_ponto) values (3, 14);

insert into cidade (nome) values ('Miami');
insert into cidade (nome) values ('Nova York');
insert into cidade (nome) values ('Paris');



drop database bd_banco;
create database bd_banco;
use bd_banco;

create table conta (
	id_conta int not null primary key auto_increment,
	user_titular varchar(30) not null,
	saldo float
);

create table movimentacao (
	id_movimentacao int not null primary key auto_increment,
	id_conta int,
	descricao varchar(40),
	dia datetime,
	valor float
);
alter table movimentacao
add constraint fk_movimentacao foreign key (id_conta) references conta (id_conta) on update cascade on delete cascade;

create table emprestimo (
	id_emprestimo int not null primary key auto_increment,
	id_conta int not null,
	dia datetime,
	valor float
);
alter table emprestimo
add constraint fk_emprestimo foreign key (id_conta) references conta (id_conta) on update cascade on delete cascade;

insert into conta (user_titular, saldo) values ('elisio.breno', 500);
insert into movimentacao (id_conta, valor, descricao, dia) values (1, 300, 'Guia', now());
insert into movimentacao (id_conta, valor, descricao, dia) values (1, 500, 'Hospedagem', now());
insert into movimentacao (id_conta, valor, descricao, dia) values (1, 700, 'Passagem de Ida', now());
insert into movimentacao (id_conta, valor, descricao, dia) values (1, 650, 'Passagem de Volta', now());

insert into emprestimo (id_conta, valor, dia) values (1, 400, '2016-05-05 14:39');
insert into emprestimo (id_conta, valor, dia) values (1, 450, '2016-05-12 15:00');

