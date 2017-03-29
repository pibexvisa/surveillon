CREATE USER 'visa'@'localhost' IDENTIFIED BY 'vi$@2017';

GRANT CREATE ON * . * TO 'visa'@'localhost';
GRANT DELETE ON * . * TO 'visa'@'localhost';
GRANT INSERT ON * . * TO 'visa'@'localhost';
GRANT SELECT ON * . * TO 'visa'@'localhost';
GRANT UPDATE ON * . * TO 'visa'@'localhost';

 FLUSH PRIVILEGES;


CREATE DATABASE visa DEFAULT CHARACTER SET utf8
  DEFAULT COLLATE utf8_general_ci;

USE visa;

CREATE TABLE caso (
codigo INT PRIMARY KEY AUTO_INCREMENT,
 nome VARCHAR(100) NOT NULL,
 competencia VARCHAR (30) NOT NULL,
 descricao TEXT NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8; 

create table bairro(
codigo int AUTO_INCREMENT, 
nome VARCHAR(50) NOT NULL, 
area VARCHAR(5) NOT NULL, 
primary key(codigo)
) ENGINE=InnoDB AUTO_INCREMENT=100 DEFAULT CHARSET=utf8;



create table usuario(
matricula varchar(10),
senha varchar(100),
cpf int(11) not null, 
nome varchar(40) not null,
 email varchar(40) not null, 
telefone int(11) not null, 
perfil varchar(15) not null, 
primary key(matricula)
)ENGINE=InnoDB  DEFAULT CHARSET=utf8; 


create table  visita(
codigo INT PRIMARY KEY AUTO_INCREMENT,
data DATE NOT NULL,
hora TIME NOT NULL,
observacao TEXT NOT NULL,
cod_usuario INT ,
CONSTRAINT usuario_visita_fk FOREIGN KEY (cod_usuario) REFERENCES usuario (matricula)
)ENGINE=InnoDB AUTO_INCREMENT=200 DEFAULT CHARSET=utf8; 




Insert into usuario (cpf, nome,email,telefone,perfil) values ('465456465','alesson francisco','alesson@hotmail.com','81981308','adm');
Insert into usuario (cpf, nome,email,telefone,perfil) values ('465456465',' administrado','alesson@hotmail.com','81981308','adm');
Insert into usuario (cpf, nome,email,telefone,perfil) values ('465456465',' funcionario','alesson@hotmail.com','81981308','adm');

