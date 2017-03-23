CREATE TABLE cepage (nom varchar(255) PRIMARY KEY);
CREATE TYPE EtypeSol AS ENUM ('Calcaire','Argileux','Crayeux','Marneux');
CREATE TYPE Eexposition AS ENUM ('Ensoleille','Venteux','Normal','Pluvieux');
CREATE TYPE Etraitements AS ENUM ('Pesticide','Insecticide','Herbicide','Aucun');
CREATE TYPE EmodeCulture AS ENUM ('En culture','Desherbe','Enherbe');
CREATE TABLE parcelle (
			nom varchar(255) PRIMARY KEY,
			surface int NOT NULL,
			typeSol EtypeSol,
			exposition Eexposition
			CONSTRAINT fk_cepage
				FOREIGN KEY (cepage)
				REFRENCES cepage(nom)
			);
CREATE TABLE impact(	CONSTRAINT fk_evenement
			);
CREATE TABLE traite ();
CREATE TABLE traitements (traitements Etraitements PRIMARY KEY);
CREATE TABLE exploitation (
			annee int NOT NULL,
			modeCulture EmodeCulture);
CREATE TABLE evenement(
			type varchar(255),
			date timestamp);
CREATE TABLE vin (
			nom varchar(255),
			prix int NOT NULL);
CREATE TABLE assemblage (pourcentage int);
CREATE TABLE critere (nom varchar(255));
CREATE TABLE note (note int NOT NULL);


