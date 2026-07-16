<?php
// 1. Charger les outils
require_once("Lib.php");
require_once("Recette.php");

// 2. Récupérer les infos
$id = isset($_GET['id']) ? intval($_GET['id']) : 0;
$action = $_POST['action'] ?? $_GET['action'] ?? '';

$nom = $_POST['nom'] ?? '';
$description = $_POST['description'] ?? '';
$ingredients = $_POST['ingredients'] ?? '';
$instructions = $_POST['instructions'] ?? '';
$temps_p = $_POST['temps_preparation'] ?? 0;
$temps_c = $_POST['temps_cuisson'] ?? 0;
$diff = $_POST['difficulte'] ?? 'Facile';
$type = $_POST['type_cuisine'] ?? '';
$path = $_POST['path'] ?? 'images_recettes/default.jpg';

// 3. Traiter l'image
if (isset($_FILES['my_image']) && $_FILES['my_image']['error'] == 0) {
    $target = "images_recettes/" . basename($_FILES['my_image']['name']);
    if(move_uploaded_file($_FILES['my_image']['tmp_name'], $target)){
        $path = $target;
    }
}

// 4. L'Objet Recette
$recette = new Recette($nom, $description, $ingredients, $instructions, $temps_p, $temps_c, $diff, $type, $path);
if ($id != 0) $recette->setId($id);

// 5. Exécuter l'action
$succes = false;
if ($action == "ajouter") $succes = $recette->sauvegarder();
if ($action == "modifier") $succes = $recette->modifier();
if ($action == "supprimer") $succes = $recette->supprimer($id);

// --- LA REDIRECTION ICI ---
// On utilise une balise META pour être sûr que ça redirige même si le serveur fait des caprices
?>

<meta http-equiv="refresh" content="2;url=index.php?action=afficher">

<div style="text-align:center; margin-top:100px; font-family:'Montserrat', sans-serif;">
    <div style="background: white; padding: 50px; display: inline-block; border-radius: 20px; box-shadow: 0 10px 30px rgba(0,0,0,0.1);">
        <h2 style="color: #002395;"><?php echo $succes ? "Opération réussie !" : "Erreur lors de l'opération"; ?></h2>
        <p style="color: #666; margin: 20px 0;">Redirection vers la liste des recettes dans 2 secondes...</p>
        <div style="width: 50px; height: 50px; border: 5px solid #f3f3f3; border-top: 5px solid #002395; border-radius: 50%; animation: spin 1s linear infinite; margin: auto;"></div>
    </div>
</div>

<style>
@keyframes spin { 0% { transform: rotate(0deg); } 100% { transform: rotate(360deg); } }
</style>