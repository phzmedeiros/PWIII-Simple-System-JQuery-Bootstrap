create database carros;

use carros;

create table usuarios(
    usu_id int primary key auto_increment,
    usu_nome varchar(100) not null,
    usu_email varchar(100) not null,
    usu_senha varchar(100) not null
);

create table carro(
    -- rac_id
    carro_id int primary key auto_increment,
    -- rac_nome
    carro_modelo varchar(100) not null,
    -- rac_nome_cientifico
    carro_placa varchar(100) not null
);

CREATE TABLE carro_excluido (
    carro_id_excluido INT PRIMARY KEY AUTO_INCREMENT,
    carro_modelo_excluido VARCHAR(100) NOT NULL,
    carro_placa_excluido VARCHAR(100) NOT NULL
);

insert into usuarios(usu_nome, usu_email, usu_senha) values("Pedro Medeiros", "pedromedeiros@gmail.com", "123456");