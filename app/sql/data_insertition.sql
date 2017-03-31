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

INSERT INTO vin values
    ('Saint-Amour', 5.3),
    ('Chablis', 4.1),
    ('Pouilly-Fuissé', 3.0),
    ('Sancerre', 5.1);

INSERT INTO note (vin_nom, critere_nom, note, annee) values
    ('Saint-Amour', 'Equilibre gustatif', 12, 2016),
    ('Saint-Amour', 'Longueur en bouche', 10, 2016),
    ('Chablis', 'Equilibre gustatif', 5, 2016),
    ('Chablis', 'Longueur en bouche', 10, 2016),
    ('Sancerre', 'Longueur en bouche', 16, 2016),
    ('Pouilly-Fuissé', 'Longueur en bouche', 12, 2017),
    ('Pouilly-Fuissé', 'Equilibre gustatif', 14, 2017);

INSERT INTO parcelle (nom, surface, typeSol, exposition, cepage_nom) values
    ('P-01', 1, 'Crayeux',  'Normal', 'Sauvignon'),
    ('P-02', 5, 'Crayeux',  'Venteux', 'Carignan'),
    ('P-03', 2, 'Argileux', 'Ensoleille', 'Muscat à petits grains');

INSERT INTO exploitation (parcelle_nom, annee, modeCulture) values
    ('P-01', 2016, 'Desherbé'),
    ('P-02', 2016, 'Enherbé'),
    ('P-02', 2017, 'Desherbé');

INSERT INTO assemblage (pourcentage, exploitation_annee, exploitation_parcelle, vin_nom) VALUES
    (50.0, 2016, 'P-01', 'Chablis'),
    (50.0, 2016, 'P-02', 'Chablis'),
    (100.0, 2016, 'P-01', 'Saint-Amour'),
    (100.0, 2016, 'P-02', 'Pouilly-Fuissé'),
    (50.0, 2016, 'P-01', 'Sancerre'),
    (50.0, 2016, 'P-02', 'Sancerre'),
    (100.0, 2017, 'P-02', 'Pouilly-Fuissé');

INSERT INTO impact (exploitation_annee, exploitation_parcelle, evenement_type, date) values
    (2016, 'P-01', 'Sécheresse', '2016-07-02'),
    (2016, 'P-01', 'Ouragan', '2016-09-02'),
    (2016, 'P-02', 'Ouragan',    '2016-08-02');

INSERT INTO traite (exploitation_annee, exploitation_parcelle, traitement_nom) values
    (2016, 'P-01', 'Pesticide'),
    (2016, 'P-01', 'Herbicide'),
    (2016, 'P-02', 'Pesticide'),
    (2016, 'P-02', 'Insecticide');
