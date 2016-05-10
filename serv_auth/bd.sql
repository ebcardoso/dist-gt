create database bd_auth;
use bd_auth;

create table cliente (
	id_produto int primary key auto_increment,
	nome_cliente varchar(40) not null,
	username_cliente varchar(40) not null,
	senha_cliente varchar(40) not null
);

insert into cliente (nome_cliente, username_cliente, senha_cliente) values ('Augusto Matheus Pinheiro Damasceno', 'augusto.matheus', '2009035976');
insert into cliente (nome_cliente, username_cliente, senha_cliente) values ('Bruno Leite de Almeida',             'bruno.leite',     '2012912268');
insert into cliente (nome_cliente, username_cliente, senha_cliente) values ('Elísio Breno Garcia Cardoso',        'elisio.breno',    '2012912339');
insert into cliente (nome_cliente, username_cliente, senha_cliente) values ('Felipe Cortez de Sá',                'felipe.cortez',   '2012912357');
insert into cliente (nome_cliente, username_cliente, senha_cliente) values ('Graco Babeuf Vieira Silva',          'graco.babeuf',    '2012912393');
insert into cliente (nome_cliente, username_cliente, senha_cliente) values ('Joao Pinto de Campos Neto',          'joao.pinto',      '200718266');
insert into cliente (nome_cliente, username_cliente, senha_cliente) values ('João Ricardo Tavares Gadelha',       'joao.ricardo',    '2009035828');