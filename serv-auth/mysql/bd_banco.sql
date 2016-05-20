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

create table emprestimo (
	id_emprestimo int not null primary key auto_increment,
	id_conta int,
	dia datetime,
	valor float
);

alter table emprestimo
add constraint fk_emprestimo foreign key (id_conta) references conta (id_conta) on update cascade on delete cascade;

alter table movimentacao
add constraint fk_movimentacao foreign key (id_conta) references conta (id_conta) on update cascade on delete cascade;

insert into conta (user_titular, saldo) values ('elisio.breno', 500);
insert into movimentacao (id_conta, valor, descricao, dia) values (1, 300, 'Guia', now());
insert into movimentacao (id_conta, valor, descricao, dia) values (1, 500, 'Hospedagem', now());
insert into movimentacao (id_conta, valor, descricao, dia) values (1, 700, 'Passagem de Ida', now());
insert into movimentacao (id_conta, valor, descricao, dia) values (1, 650, 'Passagem de Volta', now());

insert into emprestimo (id_conta, valor, dia) values (1, 400, '2016-05-05 14:39');
insert into emprestimo (id_conta, valor, dia) values (1, 450, '2016-05-12 15:00');

