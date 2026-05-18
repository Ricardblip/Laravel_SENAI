create database filmeLaravel;
use filmeLaravel;

create table Filme(
	id int auto_increment primary key,
    titulo varchar(255),
    dataLancamento date,
    sinopse varchar(255),
    genero varchar(255),
    orcamento double,
    created_at timestamp null,
    updated_at timestamp null
);

ALTER TABLE Filme
ADD COLUMN autor_id INT,
ADD CONSTRAINT fk_filmes_autores
FOREIGN KEY (autor_id) REFERENCES Autor(id);

create table Autores(
	id int auto_increment primary key,
    nome varchar(255),
    dataNascimento date,
    email varchar(255),
    telefone varchar(20),
    created_at timestamp null,
    updated_at timestamp null
);

select * from Filme;
select * from Autor;