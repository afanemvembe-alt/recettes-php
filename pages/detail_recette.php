<?php

$tab = remplirRecettes();
$id = isset($_GET['id']) ? intval($_GET['id']) : null;
$recette = null;

foreach($tab as $r){
    if($r->getId() == $id){
        $recette = $r;
        break;
    }
}



if($recette != null && $id != 0){
    
    $chemin = $recette->getImg();
    // Sécurité : on initialise des valeurs par défaut au cas où
    $nomImage = "Inconnu";
    $extension = "Inconnu";

    if (!empty($chemin)) {
        $imageInfos = pathinfo($chemin);
        // On vérifie si les clés existent avant de les lire
        $nomImage = isset($imageInfos['filename']) ? $imageInfos['filename'] : "Inconnu";
        $extension = isset($imageInfos['extension']) ? $imageInfos['extension'] : "N/A";
    }

    echo '
    <div class="detail-container">

        <h2>Détail de la Recette '.$recette->getNom().' </h2>

        <div class="img-detail">
            <img id="preview-image" src="'.$recette->getImg().'" alt="'.$recette->getNom().'" />
            
            <div class="attribut-img">
                <div>
                    <label>Nom Image: </label>
                    <input type="text" value="'.htmlspecialchars($nomImage).'" disabled/>
                </div>
                <div>
                    <label>Type Image: </label>
                    <input type="text" value="'.htmlspecialchars($extension).'" disabled/>
                </div>
            </div>
        </div>

       <div class="recipe-detail-grid">
    <div class="main-info">
        <h3>Instructions</h3>
        <p>'.$recette->getInstructions().'</p>
        
        <h3>Ingrédients</h3>
        <p class="ingredients-list">'.$recette->getIngredients().'</p>
    </div>
    <div class="side-info">
        <div class="info-card"><strong>⏳ Préparation:</strong> '.$recette->getTempsPreparation().' min</div>
        <div class="info-card"><strong>🔥 Cuisson:</strong> '.$recette->getTempsCuisson().' min</div>
        <div class="info-card"><strong>📊 Difficulté:</strong> '.$recette->getDifficulte().'</div>
    </div>
</div>

    </div>';
    
} else {
    echo '<h1 style="text-align:center; margin-top:100px;">Recette non trouvée</h1>';
}
?>