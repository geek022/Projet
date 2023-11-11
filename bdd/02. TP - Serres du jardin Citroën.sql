
--  Modèle relationnel : 
-- Plante (N° plante, Nom plante, N° région #)
-- Serre(N° serre, Nom serre)
-- Région (N° région, Nom région)
-- Emplacement (N° plante#, N°serre#)
-- Vaporisation (N° région#, N° serre#, fréquence)


CREATE TABLE REGION (
	noregion integer NOT NULL,
	nomregion varchar(60) NOT NULL,
	PRIMARY KEY (noregion)
);


CREATE TABLE SERRE (
	noserre integer NOT NULL,
	nomserre varchar(60) NOT NULL,
	PRIMARY KEY (noserre)
);

CREATE TABLE PLANTE (
	noplante integer NOT NULL,
	nomplante varchar(60) NOT NULL,
	noregion integer NOT NULL,
	PRIMARY KEY (noplante),
	FOREIGN KEY(noregion) REFERENCES REGION(noregion)
);


CREATE TABLE EMPLACEMENT (
	noplante integer NOT NULL,
	noserre integer NOT NULL,
	PRIMARY KEY (noplante, noserre),
	FOREIGN KEY(noplante) REFERENCES PLANTE(noplante),
	FOREIGN KEY(noserre) REFERENCES SERRE(noserre)
);


CREATE TABLE VAPORISATION (
	noregion integer NOT NULL,
	noserre integer NOT NULL,
	frequence integer NOT NULL,
	PRIMARY KEY (noregion, noserre),
	FOREIGN KEY(noregion) REFERENCES REGION(noregion),
	FOREIGN KEY(noserre) REFERENCES SERRE(noserre)
);




INSERT INTO region VALUES (1, 'Amazonie');
INSERT INTO region VALUES (2, 'Afrique equatoriale');
INSERT INTO region VALUES (3, 'Antilles');
INSERT INTO region VALUES (5, 'Pole Nord');
INSERT INTO region VALUES (4, 'Europe');
INSERT INTO region VALUES (6, 'Australie');
INSERT INTO region VALUES (7, 'Afrique tropicale');

INSERT INTO serre VALUES (3, 'Georges Bouvet');
INSERT INTO serre VALUES (4, 'Jean Odon Debeaux');
INSERT INTO serre VALUES (5, 'Armand David');
INSERT INTO serre VALUES (1, 'Exoticus');
INSERT INTO serre VALUES (2, 'Tropicalus');

INSERT INTO plante VALUES (1543, 'Tabilga', 2);
INSERT INTO plante VALUES (2541, 'Locidus', 6);
INSERT INTO plante VALUES (1458, 'Bananier', 3);
INSERT INTO plante VALUES (1462, 'Bananier', 6);
INSERT INTO plante VALUES (1489, 'Cacaotier', 7);
INSERT INTO plante VALUES (3549, 'Lissurelle', 1);
INSERT INTO plante VALUES (3681, 'Coranil', 1);
INSERT INTO plante VALUES (2124, 'Rubra', 4);
INSERT INTO plante VALUES (2125, 'Caricina', 4);
INSERT INTO plante VALUES (2145, 'Carex', 4);


INSERT INTO emplacement VALUES (1543, 1);
INSERT INTO emplacement VALUES (2541, 1);
INSERT INTO emplacement VALUES (1458, 1);
INSERT INTO emplacement VALUES (1462, 1);
INSERT INTO emplacement VALUES (1489, 2);
INSERT INTO emplacement VALUES (3549, 2);
INSERT INTO emplacement VALUES (3681, 2);
INSERT INTO emplacement VALUES (2124, 3);
INSERT INTO emplacement VALUES (2125, 3);
INSERT INTO emplacement VALUES (2145, 3);



INSERT INTO vaporisation VALUES (2, 1, 15);
INSERT INTO vaporisation VALUES (3, 1, 10);
INSERT INTO vaporisation VALUES (2, 2, 12);
INSERT INTO vaporisation VALUES (1, 3, 7);
INSERT INTO vaporisation VALUES (4, 3, 20);
INSERT INTO vaporisation VALUES (5, 3, 16);
INSERT INTO vaporisation VALUES (6, 1, 3);
INSERT INTO vaporisation VALUES (7, 1, 25);




