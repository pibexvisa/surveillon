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
codigo int AUTO_INCREMENT,
matricula VARCHAR(10) unique NOT  NULL,
senha VARCHAR(100) NOT NULL,
cpf VARCHAR(11) NOT NULL, 
nome VARCHAR(40) NOT NULL,
 email VARCHAR(40) NOT NULL, 
telefone VARCHAR(11) NOT NULL, 
perfil VARCHAR(15) NOT NULL, 
primary key(codigo)
)ENGINE=InnoDB  DEFAULT CHARSET=utf8;


create table  visita(
codigo INT PRIMARY KEY AUTO_INCREMENT,
data DATE NOT NULL,
hora TIME NOT NULL,
observacao TEXT NOT NULL,
matricula_usuario VARCHAR(10),
CONSTRAINT usuario_visita_fk FOREIGN KEY (matricula_usuario) REFERENCES usuario (matricula)
)ENGINE=InnoDB AUTO_INCREMENT=200 DEFAULT CHARSET=utf8;


create table denuncia(protocolo varchar(30)  not null primary key,
nome_solicitante varchar(50) not null,
data_solicitacao date,
logradouro varchar(50) not null,
numero int(4) not null,
area int(5) not null,
competencia varchar(50) not null,
situacao varchar(20) not null,
data_atendimento date,
pendencias varchar(255) not null,
observacoes text not null,
parecer varchar(255) not null,
nome_responsavel varchar(50) not null,
rg_responsavel varchar(11) not null,
cod_bairro int(5) not null,
cod_caso int(5) not null,
recebido_usuario varchar(50) not null,
CONSTRAINT bairro_denuncia_fk FOREIGN KEY (cod_bairro) REFERENCES bairro (codigo),
CONSTRAINT caso_denuncia_fk FOREIGN KEY (cod_caso) REFERENCES caso (codigo),
CONSTRAINT usuario_denuncia_fk FOREIGN KEY (recebido_usuario) REFERENCES usuario(matricula)	
)ENGINE=InnoDB  DEFAULT CHARSET=utf8;
 

Insert into usuario (matricula, senha, cpf, nome, email, telefone,perfil) 
values 
 ('TIJG5289','1234','08807706659','Pedro Lima','adm@visa.com','8198130844','Administrador'),
 ('TIJG5285','2222','088077124547','Aline Silva','funconario@visa.com','8192130448','Administrador');


