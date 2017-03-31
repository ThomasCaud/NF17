CREATE TYPE EtypeSol AS ENUM ('Calcaire','Argileux','Crayeux','Marneux');
CREATE TYPE Eexposition AS ENUM ('Ensoleille','Venteux','Normal','Pluvieux');
CREATE TYPE EmodeCulture AS ENUM ('Desherbé','Enherbé');

CREATE TABLE cepage (nom varchar(255) PRIMARY KEY);

CREATE TABLE parcelle (
			nom varchar(255) PRIMARY KEY,
			surface int NOT NULL,
			typeSol EtypeSol,
			exposition Eexposition,
			cepage_nom varchar(255) REFERENCES cepage(nom) ON UPDATE CASCADE ON DELETE CASCADE,
			CHECK (surface >= 0)
			);
CREATE TABLE exploitation (
			parcelle_nom varchar(255) REFERENCES parcelle (nom) ON UPDATE CASCADE ON DELETE CASCADE,
			annee int NOT NULL,
			modeCulture EmodeCulture,
			PRIMARY KEY (annee, parcelle_nom),
			CHECK (annee > 1600 AND annee < 7000)
			);
CREATE TABLE traitement (
			nom varchar(255) PRIMARY KEY
			);
CREATE TABLE traite (
			exploitation_annee int,
			exploitation_parcelle varchar(255),
			traitement_nom varchar(255) REFERENCES traitement(nom) ON UPDATE CASCADE,
			FOREIGN KEY (exploitation_annee, exploitation_parcelle) REFERENCES exploitation (annee,parcelle_nom) ON DELETE CASCADE,
			PRIMARY KEY(exploitation_annee, exploitation_parcelle, traitement_nom)
			);
CREATE TABLE evenement (
			type varchar(255) PRIMARY KEY
			);
CREATE TABLE impact (
			exploitation_annee int,
			exploitation_parcelle varchar(255),
			evenement_type varchar(255) REFERENCES evenement (type) ON UPDATE CASCADE,
			date timestamp NOT NULL,
			FOREIGN KEY (exploitation_annee, exploitation_parcelle) REFERENCES exploitation (annee,parcelle_nom) ON UPDATE CASCADE ON DELETE CASCADE,
			PRIMARY KEY (exploitation_parcelle, evenement_type, date)
			);
CREATE TABLE vin (
			nom varchar(255),
			prix NUMERIC(10, 2) NOT NULL,
			annee int,
			CHECK (prix >= 0),
			PRIMARY KEY(nom, annee)
			);
CREATE TABLE assemblage (
			pourcentage NUMERIC(5, 2) NOT NULL DEFAULT 100,
			exploitation_annee int,
			exploitation_parcelle varchar(255),
			FOREIGN KEY (exploitation_annee, exploitation_parcelle) REFERENCES exploitation (annee,parcelle_nom) ON UPDATE CASCADE ON DELETE CASCADE,
			vin_nom VARCHAR(255),
			vin_annee int,
			FOREIGN KEY (vin_nom, vin_annee) REFERENCES vin (nom, annee) ON UPDATE CASCADE ON DELETE CASCADE,
			PRIMARY KEY (vin_nom, vin_annee, exploitation_parcelle, exploitation_annee),
			CHECK (pourcentage > 0 AND pourcentage <= 100)
			);
CREATE TABLE critere (
			nom varchar(255) PRIMARY KEY
			);
CREATE TABLE note (
			note int NOT NULL CHECK(note >= 0 AND note <= 20),
			critere_nom VARCHAR(255) REFERENCES critere(nom) ON UPDATE CASCADE ON DELETE CASCADE,
			vin_nom VARCHAR(255),
			vin_annee int,
			FOREIGN KEY (vin_nom, vin_annee) REFERENCES vin (nom, annee) ON UPDATE CASCADE ON DELETE CASCADE,
			PRIMARY KEY(critere_nom, vin_nom, vin_annee)
			);

CREATE VIEW vin_view AS
	SELECT vin.*, ROUND(AVG(note), 2) as note FROM vin LEFT JOIN note ON vin.nom = note.vin_nom AND vin.annee = note.vin_annee GROUP BY vin.nom, vin.annee;
