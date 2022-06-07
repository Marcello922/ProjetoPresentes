CREATE database dbpresentes;

CREATE TABLE lista(codLista1 int4 PRIMARY KEY, codUsuario int4);

CREATE TABLE usuario(codUsuario int4 PRIMARY KEY, email varchar(40), endereco varchar(40), numero smallint, complemento varchar(40));

CREATE TABLE listausuario(codlista int4, codusuario int4, FOREIGN KEY(codlista,codusuario) references lista(codlista,codusuario));

CREATE TABLE item(coditem int4 primary key, nome varchar(30), preco double);

CREATE TABLE itemlista(coditem int4, codlista int4, foreign key(coditem,codlista) references item(coditem,codlista));

DELIMITER $
CREATE PROCEDURE remove_usuario(IN codusuario INT)
BEGIN 
	DELETE FROM usuario WHERE codusuario = codusuario;
END$
DELIMITER ;

DELIMITER $
CREATE PROCEDURE adiciona_usuario(IN nome INT, IN email varchar(40), IN endereco varchar(40), IN numero smallint, IN complemento varchar(40))
BEGIN 
	INSERT INTO usuario(nome,email,endereco,numero,complemento) VALUES(nome, email, endereco, numero, complemento);
END$
DELIMITER ;

DELIMITER $
CREATE PROCEDURE adiciona_lista(IN codusuario int4)
BEGIN 
	INSERT INTO lista(codusuario) VALUES (codusuario);
END$
DELIMITER ;

DELIMITER $
CREATE PROCEDURE remove_lista(IN codlista int4)
BEGIN 
	DELETE FROM lista WHERE codlista = codlista;
END$
DELIMITER ;

DELIMITER $
CREATE PROCEDURE adiciona_item_lista(IN coditem int4, IN codlista int4)
BEGIN 
	INSERT INTO listaitem(coditem,codlista) VALUES(coditem,codlista);
END$
DELIMITER ;

DELIMITER $
CREATE PROCEDURE remove_item_lista(IN coditem int4, IN codlista int4)
BEGIN 
	DELETE FROM listaitem WHERE coditem = coditem AND codlista = codlista;
END$
DELIMITER ;

DELIMITER $
CREATE TRIGGER tgr_usuario_delete AFTER DELETE
ON usuario
FOR EACH ROW
BEGIN
	DELETE FROM listausuario WHERE codusuario = OLD.codusuario;
END$
DELIMITER ;

DELIMITER $
CREATE TRIGGER tgr_lista_delete AFTER DELETE
ON lista
FOR EACH ROW
BEGIN
	DELETE FROM itemlista WHERE codlista = OLD.codlista;
END$
DELIMITER ;

DELIMITER $
CREATE TRIGGER tgr_item_delete AFTER DELETE
ON item
FOR EACH ROW
BEGIN
	DELETE FROM itemlista WHERE coditem = OLD.coditem;
END$
DELIMITER ;

/*
UTILIZAR PROCEDURE PARA CRUD

UTILIZAR TRIGGER PARA EXCLUIR REGISTROS RELACIONADOS */