
CREATE TABLE Aplicativo (
                id_aplicativo BIGINT AUTO_INCREMENT NOT NULL,
                nome VARCHAR(50) NOT NULL,
                PRIMARY KEY (id_aplicativo)
);


CREATE TABLE Perfil (
                id_perfil BIGINT AUTO_INCREMENT NOT NULL,
                perfil VARCHAR(50) NOT NULL,
                PRIMARY KEY (id_perfil)
);


CREATE TABLE Pessoa (
                id_pessoa BIGINT AUTO_INCREMENT NOT NULL,
                nome VARCHAR(50) NOT NULL,
                cpf VARCHAR(11) NOT NULL,
                dt_nascimento DATE NOT NULL,
                rg VARCHAR(8) NOT NULL,
                PRIMARY KEY (id_pessoa)
);


CREATE TABLE Perfil_pessoa (
                id_perfil_pessoa BIGINT AUTO_INCREMENT NOT NULL,
                id_perfil BIGINT NOT NULL,
                id_pessoa BIGINT NOT NULL,
                PRIMARY KEY (id_perfil_pessoa)
);


CREATE TABLE Pessoa_aplicativo (
                id_pessoa_aplicativo BIGINT AUTO_INCREMENT NOT NULL,
                id_perfil_pessoa BIGINT NOT NULL,
                id_aplicativo BIGINT NOT NULL,
                PRIMARY KEY (id_pessoa_aplicativo)
);


ALTER TABLE Pessoa_aplicativo ADD CONSTRAINT pessoa_aplicativo_aplicativo_fk
FOREIGN KEY (id_aplicativo)
REFERENCES Aplicativo (id_aplicativo)
ON DELETE NO ACTION
ON UPDATE NO ACTION;

ALTER TABLE Perfil_pessoa ADD CONSTRAINT perfil_perfil_pessoa_fk
FOREIGN KEY (id_perfil)
REFERENCES Perfil (id_perfil)
ON DELETE NO ACTION
ON UPDATE NO ACTION;

ALTER TABLE Perfil_pessoa ADD CONSTRAINT pessoa_perfil_pessoa_fk
FOREIGN KEY (id_pessoa)
REFERENCES Pessoa (id_pessoa)
ON DELETE NO ACTION
ON UPDATE NO ACTION;

ALTER TABLE Pessoa_aplicativo ADD CONSTRAINT perfil_pessoa_pessoa_aplicativo_fk
FOREIGN KEY (id_perfil_pessoa)
REFERENCES Perfil_pessoa (id_perfil_pessoa)
ON DELETE NO ACTION
ON UPDATE NO ACTION;
