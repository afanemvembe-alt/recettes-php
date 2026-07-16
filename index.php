<?php
// 1. Début du HTML (barre de navigation)
include("pages/frag_deb.php");

// 2. Librairie et classes
require_once("Lib.php");
require_once("Recette.php"); 

// 3. Récupération de l'action (accueil par défaut)
$action = isset($_GET['action']) ? trim($_GET['action']) : 'accueil';

// 4. Routage vers les pages
switch($action) {
    case 'accueil':
        include("pages/accueil.php");
        break;
    case 'afficher':
        include("pages/afficher_recettes.php");
        break;
    case "ajouter":
        include("pages/ajouter_recette.php");
        break;
    case "enregistrer":
        include("pages/enregistrer_recette.php");
        break;
    case "detail":
        include("pages/detail_recette.php");
        break;
    case "modifier":
        include("pages/modifier_recette.php");
        break;
    case "supprimer":
        include("pages/supprimer_recette.php");
        break;
    case "apropos":
        include("pages/apropos_recette.php");
        break;
    default:
        include("pages/404.php");
        break;
}

// 5. Fin du HTML
include("pages/frag_fin.php");
?>