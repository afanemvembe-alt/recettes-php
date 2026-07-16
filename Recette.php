<?php

class Recette {

    public $id;
    public $nom;
    public $description;
    public $ingredients;
    public $instructions;
    public $temps_preparation;
    public $temps_cuisson;
    public $difficulte;
    public $type_cuisine;
    public $img;
    private $connection; // Sécurisé en private

    function __construct(
        $nom = null, $description = null, $ingredients = null, $instructions = null,
        $temps_preparation = null, $temps_cuisson = null, $difficulte = null,
        $type_cuisine = null, $img = null
    ) {
        
        if ($nom !== null) $this->nom = htmlspecialchars($nom);
        if ($description !== null) $this->description = htmlspecialchars($description);
        if ($ingredients !== null) $this->ingredients = htmlspecialchars($ingredients);
        if ($instructions !== null) $this->instructions = htmlspecialchars($instructions);
        
        if ($temps_preparation !== null) $this->temps_preparation = intval($temps_preparation);
        if ($temps_cuisson !== null) $this->temps_cuisson = intval($temps_cuisson);
        
        if ($difficulte !== null) $this->difficulte = $difficulte;
        if ($type_cuisine !== null) $this->type_cuisine = htmlspecialchars($type_cuisine);
        if ($img !== null) $this->img = $img;
        
        // On initialise la connexion seulement si la fonction de connexion existe
        if (function_exists('connecter')) {
            $this->connection = connecter(); 
        }
    }

    // Setter pour l'ID (Indispensable pour UPDATE et DELETE)
    public function setId($id) { 
        $this->id = intval($id); 
    }

    // Getters
    public function getId() { return $this->id; }
    public function getNom() { return $this->nom; }
    public function getDescription() { return $this->description; }
    public function getIngredients() { return $this->ingredients; }
    public function getInstructions() { return $this->instructions; }
    public function getTempsPreparation() { return $this->temps_preparation; }
    public function getTempsCuisson() { return $this->temps_cuisson; }
    public function getDifficulte() { return $this->difficulte; }
    public function getTypeCuisine() { return $this->type_cuisine; }
    public function getImg() { return $this->img; }

    // Assure la connexion si elle a été créée après l'instanciation (ex: via FETCH_CLASS)
    private function recupererConnexion(): bool {
        if ($this->connection !== null) {
            return true;
        }
        if (function_exists('connecter')) {
            $this->connection = connecter();
            return $this->connection !== null;
        }
        return false;
    }

    // --- AJOUTER UNE RECETTE ---
    public function sauvegarder(): bool {
        if (!$this->recupererConnexion()) return false;

        $requete = "INSERT INTO Recette (nom, description, ingredients, instructions, 
                    temps_preparation, temps_cuisson, difficulte, type_cuisine, img) 
                    VALUES (:nom, :description, :ingredients, :instructions, 
                    :temps_preparation, :temps_cuisson, :difficulte, :type_cuisine, :img)";
        
        try {
            $stmt = $this->connection->prepare($requete);
            return $stmt->execute([
                ":nom" => $this->nom,
                ":description" => $this->description,
                ":ingredients" => $this->ingredients,
                ":instructions" => $this->instructions,
                ":temps_preparation" => $this->temps_preparation,
                ":temps_cuisson" => $this->temps_cuisson,
                ":difficulte" => $this->difficulte,
                ":type_cuisine" => $this->type_cuisine,
                ":img" => $this->img
            ]);
        } catch (PDOException $e) {
            return false;
        }
    }

    // --- MODIFIER UNE RECETTE ---
    public function modifier($id_param = null): bool {
        if (!$this->recupererConnexion()) return false;

        // On utilise l'ID passé en paramètre ou celui déjà stocké dans l'objet
        $final_id = ($id_param !== null) ? intval($id_param) : $this->id;

        if ($final_id <= 0) return false;

        $requete = "UPDATE Recette SET nom=:nom, description=:description, ingredients=:ingredients,
                    instructions=:instructions, temps_preparation=:temps_preparation,
                    temps_cuisson=:temps_cuisson, difficulte=:difficulte, type_cuisine=:type_cuisine,
                    img=:img WHERE id=:id";

        try {
            $stmt = $this->connection->prepare($requete);
            return $stmt->execute([
                ":nom" => $this->nom,
                ":description" => $this->description,
                ":ingredients" => $this->ingredients,
                ":instructions" => $this->instructions,
                ":temps_preparation" => $this->temps_preparation,
                ":temps_cuisson" => $this->temps_cuisson,
                ":difficulte" => $this->difficulte,
                ":type_cuisine" => $this->type_cuisine,
                ":img" => $this->img,
                ":id" => $final_id
            ]);
        } catch (PDOException $e) {
            return false;
        }
    }

    // --- SUPPRIMER UNE RECETTE ---
    public function supprimer($id_param = null): bool {
        if (!$this->recupererConnexion()) return false;

        $final_id = ($id_param !== null) ? intval($id_param) : $this->id;
        if ($final_id <= 0) return false;

        $requete = "DELETE FROM Recette WHERE id=:id";
        try {
            $stmt = $this->connection->prepare($requete);
            return $stmt->execute([":id" => $final_id]);
        } catch (PDOException $e) {
            return false;
        }
    }

    public function __destruct() {
        $this->connection = null;
    }

    public function __toString() {
        return $this->nom . " (" . $this->type_cuisine . ")";
    }
}
?>
