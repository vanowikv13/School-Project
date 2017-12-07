create database logowanie;
create table uzyt (login varchar(40) primary key,haslo varchar(40),status bool not null);
create table dane_uzyt(login varchar(40) primary key,imie varchar(40)not null,nazwisko varchar(40)not null,email varchar(40)not null,adres varchar(40)not null,telefon varchar(11)not null);