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

INSERT INTO note (vin_nom, critere_nom, note) values
    ('Saint-Amour', 'Equilibre gustatif', 12),
    ('Saint-Amour', 'Longueur en bouche', 10),
    ('Chablis', 'Equilibre gustatif', 5),
    ('Chablis', 'Longueur en bouche', 10),
    ('Sancerre', 'Longueur en bouche', 16);
