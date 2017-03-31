INSERT INTO critere values
    ('Equilibre gustatif'),
    ('Longueur en bouche');

INSERT INTO evenement values
    ('Tsunami'),
    ('Grêle'),
    ('Tornade'),
    ('Tempête'),
    ('Ouragan'),
    ('Sécheresse');

INSERT INTO traitement values
    ('Insecticide'),
    ('Pesticide'),
    ('Herbicide');

INSERT INTO cepage values
    ('Chardonnay'),
    ('Sauvignon'),
    ('Viognier'),
    ('Sémillon'),
    ('Muscat à petits grains'),
    ('Pinot noir'),
    ('Cabernet'),
    ('Merlot'),
    ('Carignan'),
    ('Grenache');

INSERT INTO vin (id, nom, prix, annee) values
    (1, 'Saint-Amour', 5.3, 2016),
    (2, 'Chablis', 4.1, 2016),
    (3, 'Pouilly-Fuissé', 3.0, 2016),
    (4, 'Sancerre', 5.1, 2016),
    (5, 'Pouilly-Fuissé', 3.5, 2017);

-- Assure que l'index de l'id est à jour pour l'auto incrementation --
ALTER SEQUENCE vin_id_seq RESTART WITH 6;

INSERT INTO note (vin_id, critere_nom, note) values
    (1 , 'Equilibre gustatif', 12),
    (1 , 'Longueur en bouche', 10),
    (2, 'Equilibre gustatif', 5),
    (4, 'Longueur en bouche', 16),
    (2, 'Longueur en bouche', 10),
    (3, 'Longueur en bouche', 12),
    (3, 'Equilibre gustatif', 14),
    (5, 'Longueur en bouche', 14),
    (5, 'Equilibre gustatif', 16);

INSERT INTO parcelle (nom, surface, typeSol, exposition, cepage_nom) values
    ('P-01', 1, 'Crayeux',  'Normal', 'Sauvignon'),
    ('P-02', 5, 'Crayeux',  'Venteux', 'Carignan'),
    ('P-03', 2, 'Argileux', 'Ensoleille', 'Muscat à petits grains');

INSERT INTO exploitation (parcelle_nom, annee, modeCulture) values
    ('P-01', 2016, 'Desherbé'),
    ('P-02', 2016, 'Enherbé'),
    ('P-02', 2017, 'Desherbé');

INSERT INTO assemblage (pourcentage, exploitation_annee, exploitation_parcelle, vin_id) VALUES
    (50.0, 2016, 'P-01', 2),
    (50.0, 2016, 'P-02', 2),
    (100.0, 2016, 'P-01', 1 ),
    (100.0, 2016, 'P-02', 3),
    (50.0, 2016, 'P-01', 4),
    (50.0, 2016, 'P-02', 4),
    (100.0, 2017, 'P-02', 3);

INSERT INTO impact (exploitation_annee, exploitation_parcelle, evenement_type, date) values
    (2016, 'P-01', 'Sécheresse', '2016-07-02'),
    (2016, 'P-01', 'Ouragan', '2016-09-02'),
    (2016, 'P-02', 'Ouragan', '2016-08-02');

INSERT INTO traite (exploitation_annee, exploitation_parcelle, traitement_nom) values
    (2016, 'P-01', 'Pesticide'),
    (2016, 'P-01', 'Herbicide'),
    (2016, 'P-02', 'Pesticide'),
    (2016, 'P-02', 'Insecticide');
