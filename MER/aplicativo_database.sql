
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


CREATE TABLE Usuario (
                id_usuario BIGINT AUTO_INCREMENT NOT NULL,
                id_perfil BIGINT NOT NULL,
                id_pessoa BIGINT NOT NULL,
                PRIMARY KEY (id_usuario)
);


CREATE TABLE Acesso (
                id_acesso BIGINT AUTO_INCREMENT NOT NULL,
                id_usuario BIGINT NOT NULL,
                id_aplicativo BIGINT NOT NULL,
                PRIMARY KEY (id_acesso)
);


ALTER TABLE Acesso ADD CONSTRAINT acesso_aplicativo_fk
FOREIGN KEY (id_aplicativo)
REFERENCES Aplicativo (id_aplicativo)
ON DELETE NO ACTION
ON UPDATE NO ACTION;

ALTER TABLE Usuario ADD CONSTRAINT usuario_perfil_fk
FOREIGN KEY (id_perfil)
REFERENCES Perfil (id_perfil)
ON DELETE NO ACTION
ON UPDATE NO ACTION;

ALTER TABLE Usuario ADD CONSTRAINT usuario_pessoa_fk
FOREIGN KEY (id_pessoa)
REFERENCES Pessoa (id_pessoa)
ON DELETE NO ACTION
ON UPDATE NO ACTION;

ALTER TABLE Acesso ADD CONSTRAINT acesso_usuario_fk
FOREIGN KEY (id_usuario)
REFERENCES Usuario (id_usuario)
ON DELETE NO ACTION
ON UPDATE NO ACTION;

INSERT INTO `Perfil`( `perfil`) VALUES ('Gestor');
INSERT INTO `Perfil`( `perfil`) VALUES ('Usuário comum');
INSERT INTO `Perfil`( `perfil`) VALUES ('Administrador');
