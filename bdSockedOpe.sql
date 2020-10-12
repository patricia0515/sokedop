create database dbsockedOp;
use dbsockedOp;
create table usuario(
doc_usuario varchar(20) NOT NULL,
clave_usuario varchar(20) NOT NULL,
mail_usuario varchar(40)NOT NULL,
tipo_usuario varchar (50) NOT NULL,
primary key (doc_usuario)
);
insert into usuario values 
(1000366300,'12345','angiecastillo11@gmail.com','Administrador'),
(1000366269,'12546','jimmybrandon03@gmail.com','Administrador');

  CREATE TABLE  funcionario (
  id_funcionario int (4) AUTO_INCREMENT,
  usuario VARCHAR (20)NOT NULL,
  tipo_documento VARCHAR(20) NOT NULL,
  nombres VARCHAR(100) NOT NULL,
  apellidos VARCHAR(50) NOT NULL,
  celular varchar(15) NOT NULL,
  direccion VARCHAR(50) NOT NULL,
  estado VARCHAR(20) NULL,
  PRIMARY KEY (id_funcionario),
  foreign key(usuario) references usuario(doc_usuario));
 
insert into funcionario values
('','1000366300','CC','Angie','Castillo','3219334849','tv 97 b sur # 45-45','activo'),
('','1000366269','CC','Jimmy','Benavides','3219337719','tv 5 b este # 45-32','activo');               

  CREATE TABLE categoria (
  id_categoria INT(4) AUTO_INCREMENT,
  nombre VARCHAR(45) NOT NULL,
  descripcion VARCHAR(100) NOT NULL,
  condicion TINYINT NOT NULL,
  PRIMARY KEY (id_categoria));
  
INSERT INTO categoria 
(id_categoria,nombre, descripcion, condicion) 
VALUES
(1,'Benjamines', 'Niños de 7-10 Años', 1);

  CREATE TABLE  estudiante (
  no_documento INT(15) NOT NULL,
  tipo_documento VARCHAR(20) NOT NULL,
  nombres VARCHAR(50) NOT NULL,
  apellidos VARCHAR(50) NOT NULL,
  estado VARCHAR(20) NOT NULL,
  direccion varchar(20) not null,
  barrio varchar (20) not null,
  celular varchar (11) not null,
  email varchar (20) not null,
  foto varchar (30) not null,
  nombre_acudiente VARCHAR(50) NOT NULL,
  apellidos_acudiente VARCHAR(50) NOT NULL,
  tel_acudiente VARCHAR(15) NOT NULL,
  email_acudiente VARCHAR(50) NOT NULL,
  parentesco_acu varchar (10) not null,
  funcionario int (4) not null,
  categoria int (15)not null,
  PRIMARY KEY (no_documento),
  foreign key (funcionario) references funcionario(id_funcionario),
  foreign key (categoria) references categoria(id_categoria)
  );
  
INSERT INTO estudiante 
 VALUES
(1165489887, 'C.C', 'Juan Gillermo', 'Cuadrado', 'Inactivo', 'Trv 34 87-45 Sur', 'Chuniza', '3214567834', 'juancuadrado@gmail.com', 'cuadrado.jpg', 'Maria', 'Castillo', 7777270, 'catillo1245@gmail.com','Tia',1,1);

    CREATE TABLE mensualidad (
  id_mensualidad INT(4) AUTO_INCREMENT,
  valor DECIMAL(11,2) NOT NULL,
  fecha_pago DATE NOT NULL,
  mes VARCHAR(20) NOT NULL,
  estudiante INT(15) NOT NULL,
  funcionario INT(4) NOT NULL,
  PRIMARY KEY (id_mensualidad),
  foreign key (estudiante) references estudiante(no_documento),
  foreign key (funcionario) references funcionario(id_funcionario)
  );  
  INSERT INTO mensualidad
 VALUES
 ('',43000,'2020-06-07','junio',1165489887,1),
 ('',44000,'2020-05-07','mayo',1165489887,1);
 CREATE TABLE ficha_tecnica (
  id_ficha_tecnica int(4) AUTO_INCREMENT,
  fecha_nacimiento date NOT NULL,
  rh varchar(3) NOT NULL,
  edad int(11) NOT NULL,
  eps varchar(50) NOT NULL,
  estatura varchar(50) NOT NULL,
  peso varchar(50) NOT NULL,
  talla varchar(50) NOT NULL,
  n_calzada varchar(50) NOT NULL,
  posicion varchar(50) DEFAULT NULL,
  club_otro varchar(50) DEFAULT NULL,
  estudiante int(15) not null,
  primary key (id_ficha_tecnica),
  foreign key (estudiante) references estudiante(no_documento)
);
  
  CREATE TABLE rendimiento (
  id_rendimiento INT(4) AUTO_INCREMENT,
  fecha DATE NOT NULL,
  progreso VARCHAR(300) NOT NULL,
  ficha_tecnica INT(4) NOT NULL,
  PRIMARY KEY (id_rendimiento),
  foreign key (ficha_tecnica) references ficha_tecnica(id_ficha_tecnica)
  );
  
  CREATE TABLE calendario (
  id_calendario INT(4) AUTO_INCREMENT,
  nombre VARCHAR(50) NOT NULL,
  estado VARCHAR(20) NOT NULL,
  fecha DATETIME NOT NULL,
  descripcion VARCHAR(300) NOT NULL,
  funcionario INT(4) NOT NULL,
  PRIMARY KEY (id_calendario),
  foreign key (funcionario) references funcionario(id_funcionario)
  );