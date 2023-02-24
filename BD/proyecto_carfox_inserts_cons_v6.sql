create database carfox;

use carfox;

create table usuarios(
    id_usuario int (20)  primary key not null auto_increment,
    documento int (12) not null,
    nombres text (50) not null,
    apellidos text (50) not null,
    contrasena varchar (255) not null
);

create table usuario_rol (
  id_rol int(2) primary key not null auto_increment,
  rol_id text(15) not null
);

create table permisos (

    id_permiso int (2) primary key not null auto_increment,
    documento int (12) not null,
    fk_id_rol int (2) not null,
    nuevo boolean not null
    
);

create table repuestos (
    id_repuesto int (20) primary key not null auto_increment,
    repuesto varchar (20)  not null,
    descripcion varchar (50) not null,
    cod_repuesto varchar (7) not null,
    entrada int (2) not null,
    salida int (2) not null

);

create table vehiculos (
    id_vehiculo int (20) primary key not null auto_increment,
    placa varchar (6) not null,
    marca text (25) not null,
    modelo varchar (10) not null,
    tipo_de_vehiculo text (10) not null,
    mecanico int(12) not null,
    estado  text (15) not null,
    descripcion varchar (500) not null,
    doc_propietario int (10) not null
);

create table propietarios (
    id_propietario int (20) primary key not null auto_increment,
    doc_propietario int (10) not null,
    nombres text (50) not null,
    apellidos text (50) not null
);

create table observaciones (
    id_observaciones int (20) primary key not null auto_increment,
    fk_placa varchar (6) not null,
    descripcion_reparacion varchar (500) not null,
    cod_repuesto varchar (7) not null,
    documento int (12) not null,
    fecha_entrada datetime not null,
    fecha_salida datetime not null,
    imagenes varchar(200) not null,
    reporte boolean not null,
    nombre_img varchar (24) not null
);

create table imagen_reporte (
    id_img_reporte int (20) primary key not null auto_increment,
    nombre varchar (24) not null,
    urlimagen varchar (200) not null
);

create table camb_contra(
    id_pregunta int (20) primary key not null auto_increment,
    preguntas varchar (50) not null,
    respuesta text (50) not null,
    fk_documento int (12) not null
);

alter table permisos
add foreign key (documento)
references usuarios (id_usuario);

alter table permisos
add foreign key (fk_id_rol)
references usuario_rol (id_rol);

alter table vehiculos
add foreign key (mecanico)
references usuarios (id_usuario);

alter table vehiculos
add foreign key (doc_propietario)
references propietarios(id_propietario);

alter table observaciones
add foreign key (fk_placa)
references vehiculos(id_vehiculo);

alter table observaciones
add foreign key (cod_repuesto)
references repuestos(id_repuesto);

alter table camb_contra
add foreign key (fk_documento)
references usuarios(id_usuario);


insert into usuarios
values (NULL,10412890,"Camila","ceballos",1235);

insert into usuarios
values (NULL,1067219831,"Juan Jose","Florez Ruiz",1235),
(NULL,321456,"Diego Andres","Florez Gomez",2312312);

insert into usuario_rol
values (NULL,1);

insert into usuario_rol
values (NULL,2);

insert into permisos
values (NULL,10412890,1,1);

insert into permisos
values (NULL,1067219831,2,1),
(NULL,321456,2,1);

insert into propietarios
values (NULL,102839,"Juana","Lopez");

insert into propietarios
values (NULL,123456534,"Francisco","Estrada gomez"),
(NULL,6644,"Leonardo"," Pineda");

insert into vehiculos
values (NULL,"SQT290","Honda","Cap","Carro",10412890,"Mal estado","Cambio de frenos",102839);

insert into vehiculos
values (NULL,"DTE312","Renauld","Cap","Carro",1067219831,"Mal estado","Fallas de bateria",123456534),
(NULL,"DGD544","Chevrolet","Captiva","Carro",321456,"Mal estado","Falla de motor , por falta aceite ",6644);

insert into observaciones
values (NULL,"SQT290","Cambio de frenos","LLN-29",10412890,"2018-10-02 10:29:20","2020-12-09 10:30:01","Patojpg",1,"Llanta");

insert into observaciones
values (NULL,"DTE312","Al automovil se le realizo un cambio de bateria con herramientas mecanica","B-300",1067219831,"2019-03-11 10:29:20","2019-03-12 10:30:01","bateria.png",1,"Rueda"),
(NULL,"DGD544","Se inspecciono el motor y se visualizo falta de aceite el cual se cambio las partes afectadas","SDFSF",321456,"2022-02-02 10:29:20","2022-02-04 10:30:01","xxxzzz.png",1,"Motor");

insert into repuestos
values (NULL,"Llanta","Llanta para vehiculos honda","LLN-29",100,1);

insert into repuestos
values (NULL,"Bateria","Bateria para vehiculos pequeños","B-300",100,1),
(NULL,"Motor","Modelo de motor XYZ","SDFSF",100,1);

insert into imagen_reporte
values (NULL,"Llanta","prueba.png");

insert into imagen_reporte
values (NULL,"Rueda","Prueba1.jpg"),
(NULL,"Motor","Prueba2.jpg");

insert into camb_contra
values (NULL,"¿Cual fue el nombre de su primera mascota?","malcon",10412890);

insert into camb_contra
values (NULL,"¿Cual es el apellido de su abuelo?","lopez",1067219831),
(NULL,"¿Cual es su animal preferido?","mono",321456);