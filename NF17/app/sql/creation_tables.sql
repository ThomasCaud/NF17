CREATE TABLE cepage (nom varchar(255) PRIMARY KEY);
CREATE TYPE EtypeSol AS ENUM ('Calcaire','Argileux','Crayeux','Marneux');
CREATE TYPE Eexposition AS ENUM ('Ensoleille','Venteux','Normal','Pluvieux');
CREATE TYPE Etraitements AS ENUM ('Pesticide','Insecticide','Herbicide','Aucun');
CREATE TYPE EmodeCulture AS ENUM ('En culture','Desherbe','Enherbe');
CREATE TABLE parcelle (
			nom varchar(255) PRIMARY KEY,
			surface int NOT NULL,
			typeSol EtypeSol,
			exposition Eexposition,
			FOREIGN KEY (cepage) REFERENCES cepage (nom)
			);
CREATE TABLE impact(
					FOREIGN KEY (exploitation) REFERENCES exploitation (parcelle),
					FOREIGN KEY (evenement) REFERENCES evenement(typeEvent, dateEvent),
					PRIMARY KEY (exploitation, evenement),
					);
CREATE TABLE traite (FOREIGN KEY (exploitation) REFERENCES exploitation (annee,parcelle),
					FOREIGN KEY (traitement) traitements(traitements),
					PRIMARY KEY (exploitation, traitement)
					);
CREATE TABLE traitements (traitements Etraitements PRIMARY KEY);
CREATE TABLE exploitation (
			FOREIGN KEY (parcelle) REFERENCES parcelle (nom),
			annee int NOT NULL,
			modeCulture EmodeCulture,
			PRIMARY KEY (annee, parcelle)
			);
CREATE TABLE evenement(
			typeEvent varchar(255),
			dateEvent timestamp,
			PRIMARY KEY (typeEvent, dateEvent));
CREATE TABLE vin (
			nom varchar(255) PRIMARY KEY,
			prix int NOT NULL);
CREATE TABLE assemblage (pourcentage int,
						FOREIGN KEY (exploitation) REFERENCES exploitation(nom),
						FOREIGN KEY (vin) REFERENCES vin (nom),
						PRIMARY KEY (vin, exploitation)
						);
CREATE TABLE critere (nom varchar(255) PRIMARY KEY);
CREATE TABLE note (note int NOT NULL,
					FOREIGN KEY (critere) REFERENCES critere(nom),
					FOREIGN KEY (vin) REFERENCES vin(nom),
					PRIMARY KEY (vin)
					);


