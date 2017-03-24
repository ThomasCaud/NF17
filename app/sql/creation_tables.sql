CREATE TYPE EtypeSol AS ENUM ('Calcaire','Argileux','Crayeux','Marneux');
CREATE TYPE Eexposition AS ENUM ('Ensoleille','Venteux','Normal','Pluvieux');
CREATE TYPE Etraitements AS ENUM ('Pesticide','Insecticide','Herbicide','Aucun');
CREATE TYPE EmodeCulture AS ENUM ('En culture','Desherbe','Enherbe');

CREATE TABLE cepage (nom varchar(255) PRIMARY KEY);

CREATE TABLE parcelle (
			nom varchar(255) PRIMARY KEY,
			surface int NOT NULL,
			typeSol EtypeSol,
			exposition Eexposition,
			cepage_nom varchar(255) REFERENCES cepage(nom)
			);
CREATE TABLE exploitation (
			parcelle_nom varchar(255) REFERENCES parcelle (nom),
			annee int NOT NULL,
			modeCulture EmodeCulture,
			PRIMARY KEY (annee, parcelle_nom)
			);
CREATE TABLE traitement (
			nom Etraitements PRIMARY KEY
			);
CREATE TABLE traite (
			exploitation_annee int,
			exploitation_parcelle varchar(255),
			FOREIGN KEY (exploitation_annee, exploitation_parcelle) REFERENCES exploitation (annee,parcelle_nom),
			traitement_nom Etraitements REFERENCES traitement(nom),
			PRIMARY KEY(exploitation_annee, exploitation_parcelle, traitement_nom)
			);
CREATE TABLE evenement (
			type varchar(255) PRIMARY KEY
			);
CREATE TABLE impact (
			exploitation_parcelle varchar(255) REFERENCES exploitation (parcelle_nom),
			date timestamp NOT NULL,
			evenement_type varchar(255) REFERENCES evenement (type),
			PRIMARY KEY (exploitation_parcelle, evenement_type, date)
			);
CREATE TABLE vin (
			nom varchar(255) PRIMARY KEY,
			prix int NOT NULL
			);
CREATE TABLE assemblage (
			pourcentage int NOT NULL DEFAULT 100,
			exploitation_nom VARCHAR(255) REFERENCES exploitation(parcelle_nom),
			vin_nom VARCHAR(255) REFERENCES vin (nom),
			PRIMARY KEY (vin_nom, exploitation_nom)
			);
CREATE TABLE critere (
			nom varchar(255) PRIMARY KEY
			);
CREATE TABLE note (
			note int NOT NULL CHECK(note >= 0 AND note <= 20),
			critere_nom VARCHAR(255) REFERENCES critere(nom),
			vin_nom  VARCHAR(255) REFERENCES vin(nom) PRIMARY KEY
			);
