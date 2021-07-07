drop database api_fastparking;
create database api_fastparking;
use api_fastparking;
create table precos(
	idpreco int auto_increment primary key,
    primeiraHora decimal(5,2) not null,
    demaisHoras decimal(5,2) not null,
    iniciovingencia date not null,
    TerminoVingencia date
);

create table carros(
	idcarro int auto_increment primary key,
    placa varchar(10),
    proprietario varchar(60),
    horaEntrada datetime not null
);

create table historico(
	id int auto_increment primary key,
    horaSaida datetime not null,
    valorPago decimal (5,2),
    idpreco int,
    idcarro int,
    FOREIGN KEY(idpreco) REFERENCES precos(idpreco),
    FOREIGN KEY(idcarro) REFERENCES carros(idcarro)
);
