<?php


$options = array(
    1 => 'Nom',
    2 => 'TypeCuisine',
    3 => 'Difficulte',
    4 => 'TempsPreparation'
);

// Fonction pour afficher les recettes
function articlesRecettes(){
    $tab = remplirRecettes();

    if(empty($tab)){
        echo '<h1>Pas de recette</h1>';
    } else {
        $default = "images_recettes/default.jpg";

        // Fonction de comparaison
        function comparaison($a, $b, $attribut) {
            $getter = 'get' . ucfirst($attribut);
            $valueA = $a->$getter();
            $valueB = $b->$getter();
            if ($valueA == $valueB) return 0;
            return ($valueA < $valueB) ? -1 : 1;
        }

        $attributATrier = isset($_GET['filtre']) ? $_GET['filtre'] : "Nom";

        if(in_array($attributATrier, $GLOBALS['options'])){
            usort($tab, function($a, $b) use ($attributATrier) {
                return comparaison($a, $b, $attributATrier);
            });

            foreach($tab as $r){
    $imagePath = !empty($r->getImg()) ? $r->getImg() : 'images_recettes/default.jpg';

    echo '
    <article class="article-wrapper">
        <figure>
            <img src="'.$imagePath.'" alt="'.$r->getNom().'">
        </figure>
        <div class="article-body">
            <span class="badge">'.strtoupper($r->getTypeCuisine()).'</span>
            <h2 style="margin: 10px 0; font-size: 1.2rem; color: #002395;">'.$r->getNom().'</h2>
            
            <div class="recipe-meta" style="color:#777; font-size:0.85rem; margin-bottom:15px;">
                <i class="bx bx-tachometer"></i> '.$r->getDifficulte().' | 
                <i class="bx bx-time"></i> '.$r->getTempsPreparation().' min
            </div>

            <div class="button-container" style="display:flex; justify-content: space-between; align-items: center; margin-top:auto;">
                <a href="index.php?action=detail&id='.$r->getId().'" class="edit-button" style="flex-grow:1; margin-right:10px; text-align:center; background:#002395; color:white; padding:8px; border-radius:5px; text-decoration:none;">Voir la recette</a>
                
                <div class="admin-actions" style="display:flex; gap:15px; align-items:center;">
                    <a href="index.php?action=modifier&id='.$r->getId().'" title="Modifier" style="color:#002395; font-size:1.5rem; text-decoration:none;">
                        <i class="bx bx-edit-alt"></i>
                    </a>
                    
                    <a href="index.php?action=supprimer&id='.$r->getId().'" title="Supprimer" style="color:#ED2939; font-size:1.5rem; text-decoration:none;">
                        <i class="bx bx-trash"></i>
                    </a>
                </div>
            </div>
        </div>
    </article>';
}

        } else {
            echo '<h2>Attribut incorrect</h2>';
        }
    }
}

?>

<link rel="stylesheet" href="css/read.css">

<div class="container">
    <div class="search-container">
        <label>Filtrer : </label>
        <select onchange="document.location.href = 'index.php?action=afficher&filtre=' + this.value">
        <?php
            $attributATrier = isset($_GET['filtre']) ? $_GET['filtre'] : "Nom";
            foreach ($options as $value => $label) {
                $selected = ($label == $attributATrier) ? 'selected' : '';
                echo "<option value='$label' $selected>$label</option>";
            }
        ?>
        </select>
    </div>
    <div class="articles">
        <?php articlesRecettes(); ?>
    </div>
</div>