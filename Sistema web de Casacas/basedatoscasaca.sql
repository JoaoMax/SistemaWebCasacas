CREATE DATABASE basedatos_casaca;
USE basedatos_casaca;

CREATE TABLE Usuario (
  DNI INTEGER NOT NULL,
  password VARCHAR(50) NOT NULL,
  primer_nombre VARCHAR(50) NOT NULL,
  primer_apellido VARCHAR(50) NOT NULL,
  segundo_apellido VARCHAR(50) NOT NULL,
  PRIMARY KEY (DNI)
);

CREATE TABLE Telefono_usuario(
  ID_telefono_usuario INTEGER AUTO_INCREMENT NOT NULL,
  DNI_usuario INTEGER NOT NULL,
  Telefono_usuario VARCHAR(15) NOT NULL,
  PRIMARY KEY (ID_telefono_usuario, DNI_usuario)
);

CREATE TABLE Correo_usuario (
  ID_correo_usuario INTEGER AUTO_INCREMENT NOT NULL,
  DNI_usuario INTEGER NOT NULL,
  Correo_usuario VARCHAR(50) NOT NULL,
  Nombre_usuario VARCHAR(50) NOT NULL,
  PRIMARY KEY (ID_correo_usuario, DNI_usuario)
);

CREATE TABLE Casaca (
  ID_casaca INTEGER AUTO_INCREMENT NOT NULL,
  talla VARCHAR(10) NOT NULL,
  nombre VARCHAR(50) NOT NULL,
  sexo VARCHAR(10) NOT NULL,
  precio NUMERIC(6,2) NOT NULL,
  imagen VARCHAR(100) NOT NULL,
  estado INTEGER NOT NULL,
  ID_stock_casaca INTEGER NOT NULL,
  PRIMARY KEY (ID_casaca)
);

CREATE TABLE Cuenta(
  numero_cuenta INTEGER NOT NULL,
  tipo VARCHAR(20) NOT NULL,
  DNI_dueño INTEGER NOT NULL,
  PRIMARY KEY (numero_cuenta)
);

CREATE TABLE Venta (
  ID_venta INTEGER AUTO_INCREMENT NOT NULL,
  telefono_venta INTEGER NOT NULL,
  fecha DATE NOT NULL,
  estado INTEGER NOT NULL,
  direccion_envio VARCHAR(50) NOT NULL,
  token VARCHAR(20) NULL,
  DNI_usuario_venta INTEGER NULL,
  ID_casaca_venta INTEGER NOT NULL,
  ID_metodo_pago INTEGER NULL,
  PRIMARY KEY (ID_venta)
);

CREATE TABLE Metodo_pago (
  ID_pago INTEGER AUTO_INCREMENT NOT NULL,
  tranferencia INTEGER NULL DEFAULT NULL,
  tarjeta INTEGER NULL DEFAULT NULL,
  PRIMARY KEY (ID_pago)
);

CREATE TABLE Stock (
  ID_stock INTEGER NOT NULL,
  cantidad INTEGER NOT NULL,
  PRIMARY KEY (ID_stock)
);

INSERT INTO Casaca (talla, nombre, sexo, precio, imagen, estado, ID_stock_casaca)
VALUES (30, 'Casaca de Cuero', 'Hombre', '99.9', 'casaca_cuero_hombre_1.jpg', 1, 1),
(30, 'Casaca de Cuero','Mujer','99.9','casaca_cuero_mujer_1.jpg', 1, 2),
(30, 'Casaca Bomber','Hombre','139.9','casaca_bomber_hombre_1.jpg', 1, 3),
(30, 'Casaca Bomber','Hombre','159.9','casaca_bomber_hombre_2.jpg', 1, 4),
(30, 'Casaca Bomber','Mujer','139.9','casaca_bomber_mujer_1.jpg', 1, 5),
(30, 'Casaca Bomber','Mujer','159.9','casaca_bomber_mujer_2.jpg', 1, 6),
(30, 'Casaca Impermeable','Hombre','79.9','casaca_impermeable_hombre_1.jpg', 1, 7),
(30, 'Casaca Impermeable','Hombre','69.9','casaca_impermeable_hombre_2.jpg', 1, 8),
(30, 'Casaca Impermeable','Hombre','59.9','casaca_impermeable_hombre_3.jpg', 1, 9),
(30, 'Casaca Impermeable','Mujer','79.9','casaca_impermeable_mujer_1.jpg', 1, 10),
(30, 'Casaca Impermeable','Mujer','69.9','casaca_impermeable_mujer_2.jpg', 1, 11),
(30, 'Casaca Impermeable','Mujer','59.9','casaca_impermeable_mujer_3.jpg', 1, 12),
(30, 'Casaca de Jean','Hombre','99.9','casaca_jean_hombre_1.jpg', 1, 13),
(30, 'Casaca de Jean','Hombre','89.9','casaca_jean_hombre_2.jpg', 1, 14),
(30, 'Casaca de Jean','Hombre','79.9','casaca_jean_hombre_3.jpg', 1, 15),
(30, 'Casaca de Jean','Mujer','99.9','casaca_jean_mujer_1.jpg', 1, 16),
(30, 'Casaca de Jean','Mujer','89.9','casaca_jean_mujer_2.jpg', 1, 17),
(30, 'Casaca de Jean','Mujer','79.9','casaca_jean_mujer_3.jpg', 1, 18),
(30, 'Casaca Polar','Hombre','99.9','casaca_polar_hombre_1.jpg', 1, 19),
(30, 'Casaca Polar','Hombre','89.9','casaca_polar_hombre_2.jpg', 1, 20),
(30, 'Casaca Polar','Mujer','99.9','casaca_polar_mujer_1.jpg', 1, 21),
(30, 'Casaca Polar','Mujer','89.9','casaca_polar_mujer_2.jpg', 1, 22);

INSERT INTO Stock VALUES (1, 30), (2, 30), (3, 30), (4, 30),(5, 30),(6, 30),(7, 30),(8, 30),(9, 30),
(10, 30),(11, 30),(12, 30),(13, 30),(14, 30),(15, 30),(16,30),(17, 30),(18, 30),(19, 30),(20, 30),(21, 30),(22, 30);
INSERT INTO Usuario VALUES (74091359, '123456','Joao', 'Chavez', 'Salas'),
(12345678, '123456','Raul', 'Perez','Soto'),
(12345679, '123456','Maximiliano', 'Rojas', 'Huaman'),
(12345671, '123456','Rodrigo', 'Silva', 'Choque'),
(12345672, '123456','Cinthia', 'Condori', 'Aguilar'),
(12345673, '123456','Maria', 'Acostupa', 'Leguia'),
(12345674, '123456','Braulio', 'Cutipa', 'Sosa'),
(12345675, '123456','Kevin', 'Benavente', 'Ramos'),
(12345676, '123456','Agustin', 'Barrionuevo', 'Rodriguez'),
(12345677, '123456','Bryan', 'Sanchez', 'Santos'),
(12345611, '123456','Jenny', 'Villanueva', 'Tapia'),
(12345612, '123456','Christian', 'Mendoza', 'Fuentes'),
(12345613, '123456','Isaac', 'Valderrama', 'Pecharovich'),
(12345614, '123456','Jesus', 'Zegarra', 'Manrique'),
(12345615, '123456','Julio', 'Torres', 'Zevallos'),
(12345616, '123456','Rubi', 'Morante', 'Caceres'),
(12345617, '123456','Alfredo', 'Dominguez', 'Grau'),
(12345618, '123456','Sebastian', 'Arroe', 'Guerola');
INSERT INTO Telefono_usuario (DNI_usuario, Telefono_usuario)
VALUES (74091359, 931034333), (74091359, 465728),
(12345678, 999555771), (12345679, 999555710),
(12345671, 999555772), (12345672, 999555711),
(12345673, 999555773), (12345674, 999555712),
(12345675, 999555774), (12345676, 999555713),
(12345677, 999555775), (12345611, 999555714),
(12345612, 999555776), (12345613, 999555715),
(12345614, 999555777), (12345615, 999555716),
(12345616, 999555778), (12345617, 999555717),
(12345618, 999555779);
INSERT INTO Correo_usuario (DNI_usuario, Correo_usuario, Nombre_usuario)
VALUES (74091359, 'joao@gmail.com', 'JoaoMax'),
(12345678, 'Raul@gmail.com', 'Raul'),
(12345679, 'Maximiliano@gmail.com', 'Maximiliano'),
(12345671, 'Rodrigo@gmail.com', 'Rodrigo'),
(12345672, 'Cinthia@gmail.com', 'Cinthia'),
(12345673, 'Maria@gmail.com', 'Maria'),
(12345674, 'Braulio@gmail.com', 'Braulio'),
(12345675, 'Kevin@gmail.com', 'Kevin'),
(12345676, 'Agustin@gmail.com', 'Agustin'),
(12345677, 'Bryan@gmail.com', 'Bryan'),
(12345611, 'Jenny@gmail.com', 'Jenny'),
(12345612, 'Christian@gmail.com', 'Christian'),
(12345613, 'Isaac@gmail.com', 'Isaac'),
(12345614, 'Jesus@gmail.com', 'Jesus'),
(12345615, 'Julio@gmail.com', 'Julio'),
(12345616, 'Rubi@gmail.com', 'Rubi'),
(12345617, 'Alfredo@gmail.com', 'Alfredo'),
(12345618, 'Sebastian@gmail.com', 'Sebastian');
INSERT INTO Cuenta 
VALUES (123456789, 'ahorro', 74091359),
(123456788, 'credito', 12345678),
(123456787, 'ahorro', 12345679),
(123456786, 'credito', 12345671),
(123456785, 'sueldo', 12345672),
(123456784, 'ahorro', 12345673),
(123456783, 'credito', 12345674),
(123456782, 'sueldo', 12345675),
(123456781, 'credito', 12345676),
(123456780, 'ahorro', 12345677),
(123456779, 'credito', 12345611),
(123456778, 'sueldo', 12345612),
(123456777, 'ahorro', 12345613),
(123456776, 'credito', 12345614),
(123456775, 'credito', 12345615),
(123456774, 'ahorro', 12345616),
(123456773, 'sueldo', 12345617),
(123456772, 'credito', 12345618);

ALTER TABLE Telefono_usuario ADD FOREIGN KEY (DNI_usuario) REFERENCES Usuario (DNI);
ALTER TABLE Casaca ADD FOREIGN KEY (ID_stock_casaca) REFERENCES Stock (ID_stock);
ALTER TABLE Correo_usuario ADD FOREIGN KEY (DNI_usuario) REFERENCES Usuario (DNI);
ALTER TABLE Cuenta ADD FOREIGN KEY (DNI_dueño) REFERENCES Usuario (DNI);
ALTER TABLE Venta ADD FOREIGN KEY (DNI_usuario_venta) REFERENCES Usuario (DNI);
ALTER TABLE Venta ADD FOREIGN KEY (ID_casaca_venta) REFERENCES Casaca (ID_casaca);
ALTER TABLE Venta ADD FOREIGN KEY (ID_metodo_pago) REFERENCES Metodo_pago (ID_pago);




