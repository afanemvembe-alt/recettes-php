<?php
// On inclut la classe Recette pour que PDO puisse créer les objets
require_once('Recette.php');

/**
 * Connexion à la base de données
 */
function connecter(): ?PDO {
    require_once('config.php');

    $options = [
        PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8mb4",
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ // Optionnel mais pratique
    ];

    try {
        // Utilisation du DSN configuré dans config.php
        $connection = new PDO(DB_DSN, DB_USER, DB_PASS, $options);
        return $connection;
    } catch (PDOException $e) {
        die("Erreur de connexion : " . $e->getMessage());
    }
}

/**
 * Récupère les recettes avec option de TRI (Filtrage)
 * @param string $tri La colonne sur laquelle trier
 */
function remplirRecettes(string $tri = 'id'): array {
    $connection = connecter();
    if ($connection === null) return [];

    // --- SÉCURITÉ DU FILTRE ---
    // On définit les colonnes autorisées pour éviter les injections SQL
    $colonnes_autorisees = ['nom', 'type_cuisine', 'difficulte', 'temps_preparation', 'id'];
    
    // Si le tri demandé n'est pas dans la liste, on trie par ID par défaut
    if (!in_array($tri, $colonnes_autorisees)) {
        $tri = 'id';
    }

    // Requête dynamique avec le TRI choisi
    $requete = "SELECT * FROM Recette ORDER BY $tri ASC"; 

    try {
        $query = $connection->prepare($requete);
        $query->execute();

        // Récupération sous forme d'objets de la classe Recette
        return $query->fetchAll(
            PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, 
            'Recette'
        );

    } catch (PDOException $e) {
        return [];
    }
}

/**
 * Liste des images disponibles pour le formulaire
 */
function imagesRecettes(): array {
    $dossier = 'images_recettes/';
    
    if (!is_dir($dossier)) return []; 

    $images = []; 
    $fichiers = scandir($dossier);
    
    foreach ($fichiers as $fichier) {
        $extension = strtolower(pathinfo($fichier, PATHINFO_EXTENSION));
        // On ignore les points (.) et (..) et on ne prend que les images
        if ($fichier !== '.' && $fichier !== '..' && in_array($extension, ['jpg','jpeg','png','gif'])) {
            $images[] = $dossier . $fichier;
        }
    }

    return $images;
}
?>