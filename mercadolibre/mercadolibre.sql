create database MERCADO_LIBRE;

USE MERCADO_LIBRE;

CREATE TABLE ARTICULO(
	ART_CVE_ARTICULO	INT		PRIMARY KEY NOT NULL,
    ART_DESCRIPCION		VARCHAR(150)	NOT NULL,
    ART_IMAGEN			VARCHAR(100)	NOT NULL,
    ART_URL				VARCHAR(100)	NOT NULL
);

INSERT INTO ARTICULO VALUES(1, 'JABÓN DE TOCADOR', 'imagenes/1.jpg','www.jabondetocador.com');
INSERT INTO ARTICULO VALUES(2, 'CLORALEX', 'imagenes/2.jpg','www.cloralex.com');
INSERT INTO ARTICULO VALUES(3, 'SHAMPOO HEAD & SHOULDERS', 'imagenes/3.jpg','www.hands.com');
INSERT INTO ARTICULO VALUES(4, 'DESODORANTE DOVE', 'imagenes/4.jpg','www.dove.com');
INSERT INTO ARTICULO VALUES(5, 'PASTA DENTAL COLGATE', 'imagenes/5.jpg','www.colgate.com');
INSERT INTO ARTICULO VALUES(6, 'CEPILLO DENTAL ORAL B', 'imagenes/6.jpg','www.oralb.com');
INSERT INTO ARTICULO VALUES(7, 'SALSA VALENTINA', 'imagenes/7.jpg','www.valentina.com');
INSERT INTO ARTICULO VALUES(8, 'CATSUP DEL MONTE', 'imagenes/8.jpg','www.delmonte.com');
INSERT INTO ARTICULO VALUES(9, 'MERMELADA DE FRESA SMUCKERS', 'imagenes/9.jpg','www.smuckers.com');
INSERT INTO ARTICULO VALUES(10, 'LECHERA NESTLE', 'imagenes/10.jpg','www.nestle.com');
INSERT INTO ARTICULO VALUES(11, 'CARNATION CLAVEL NESTLE', 'imagenes/11.jpg','www.nestlecarnation.com');
INSERT INTO ARTICULO VALUES(12, 'TANG NARANJA', 'imagenes/12.jpg','www.tang.com');
INSERT INTO ARTICULO VALUES(13, 'COCA-COLA', 'imagenes/13.jpg','www.cocacola.com');
INSERT INTO ARTICULO VALUES(14, 'RED-COLA', 'imagenes/14.jpg','www.redcola.com');
INSERT INTO ARTICULO VALUES(15, 'LOMO DE ATÚN HERDEZ', 'imagenes/15.jpg','www.herdez.com');
INSERT INTO ARTICULO VALUES(16, 'FRIJOLES LA COSTEÑA', 'imagenes/16.png','www.lacosteña.com');
INSERT INTO ARTICULO VALUES(17, 'NUTRILECHE', 'imagenes/17.jpg','www.nutrileche.com');
INSERT INTO ARTICULO VALUES(18, 'MOSTAZA McCORMICK', 'imagenes/18.jpg','www.mccormick.com');
INSERT INTO ARTICULO VALUES(19, 'CHILES SAN MARCOS', 'imagenes/19.jpg','www.sanmarcos.com');
INSERT INTO ARTICULO VALUES(20, 'MAYONESA McCORMICK', 'imagenes/20.jpg','www.mccormickmayonesa.com');

