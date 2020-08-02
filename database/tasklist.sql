CREATE DATABASE tasklist;
USE tasklist;

CREATE TABLE tasks(
id               int(255) auto_increment not null,
nombre           varchar(100) not null,
descripcion      text,
creacion_date    date not null,
CONSTRAINT tasks PRIMARY KEY(id)
)ENGINE=InnoDb;