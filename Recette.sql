DROP TABLE IF EXISTS Recette;

CREATE TABLE Recette (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nom VARCHAR(150) NOT NULL,
    type_cuisine VARCHAR(100) NOT NULL, -- Ex: Italien, Asiatique, Dessert...
    difficulte VARCHAR(50) NOT NULL,     -- Ex: Facile, Moyen, Difficile
    temps_preparation INT NOT NULL,     -- En minutes (numérique)
    instructions TEXT NOT NULL,         -- Texte long
    image_url VARCHAR(255) DEFAULT 'images_recettes/default.jpg'
);

INSERT INTO Recette (nom, type_cuisine, difficulte, temps_preparation, instructions, image_url) VALUES 
('Pâtes Bolognaise', 'Italien', 'Facile', 30, 'Faire cuire les pâtes et ajouter la sauce.', 'images_recettes/bolognaise.jpg'),
('Salade de fruits', 'Dessert', 'Facile', 10, 'Couper les fruits et mélanger.', 'images_recettes/fruit.jpg'),
('Gâteau au Chocolat', 'Dessert', 'Moyen', 45, 'Mélanger les ingrédients et cuire 30 min à 180°C.', 'images_recettes/gateau.jpg');