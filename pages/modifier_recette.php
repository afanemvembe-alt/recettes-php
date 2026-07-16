<?php

$tab = remplirRecettes(); // récupère toutes les recettes
$id = isset($_GET['id']) ? intval($_GET['id']) : null;
$recette = null;

// Chercher la recette par ID
foreach($tab as $r){
    if($r->getId() == $id){
        $recette = $r;
        break;
    }
}


if($recette != null && $id != 0){

echo '
<h2>Modification de la recette '.$recette->getNom().' </h2>

<form method="post" action="index.php?action=enregistrer&id='.$recette->getId().'" enctype="multipart/form-data" class="form">
    <input type="hidden" id="nom-old" value="'.$recette->getNom().'">
    <input type="hidden" id="description-old" value="'.$recette->getDescription().'">
    <input type="hidden" id="ingredients-old" value="'.$recette->getIngredients().'">
    <input type="hidden" id="instructions-old" value="'.$recette->getInstructions().'">
    <input type="hidden" id="temps_preparation-old" value="'.$recette->getTempsPreparation().'">
    <input type="hidden" id="temps_cuisson-old" value="'.$recette->getTempsCuisson().'">
    <input type="hidden" id="type_cuisine-old" value="'.$recette->getTypeCuisine().'">
    <input type="hidden" id="image-old" value="'.$recette->getImg().'">
    
    <input type="hidden" name="action" value="modifier">
    <input type="hidden" name="path" value="'.$recette->getImg().'">

    <div class="form-img">
        <figure>
            <img id="preview-image" src="images_recettes/'.$recette->getImg().'" alt="Aperçu" />
        </figure>
        
        <div class="img-btn">
            <a id="btn-img" onclick="chooseImage()">Changer l\'image</a>
            <input type="file" id="image" name="my_image" style="display: none;">
        </div>
    </div>

    <div class="form-body">
        <div>
            <label for="nom">Nom:</label>
            <input type="text" id="nom" name="nom" value="'.$recette->getNom().'" required>
        </div>

        <div>
            <label for="description">Description:</label>
            <textarea id="description" name="description" required>'.$recette->getDescription().'</textarea>
        </div>

        <div>
            <label for="ingredients">Ingrédients:</label>
            <textarea id="ingredients" name="ingredients" required>'.$recette->getIngredients().'</textarea>
        </div>

        <div>
            <label for="instructions">Instructions:</label>
            <textarea id="instructions" name="instructions" required>'.$recette->getInstructions().'</textarea>
        </div>

        <div class="row-inputs" style="display: flex; gap: 10px;">
            <div style="flex: 1;">
                <label for="temps_preparation">Prép (min):</label>
                <input type="number" id="temps_preparation" name="temps_preparation" value="'.$recette->getTempsPreparation().'" required style="width: 100%;">
            </div>
            <div style="flex: 1;">
                <label for="temps_cuisson">Cuisson (min):</label>
                <input type="number" id="temps_cuisson" name="temps_cuisson" value="'.$recette->getTempsCuisson().'" required style="width: 100%;">
            </div>
        </div>

        <div>
            <label for="difficulte">Difficulté:</label>
            <select id="difficulte" name="difficulte" style="width: 100%;">
                <option value="Facile" '.($recette->getDifficulte()=='Facile'?'selected':'').'>Facile</option>
                <option value="Moyenne" '.($recette->getDifficulte()=='Moyenne'?'selected':'').'>Moyenne</option>
                <option value="Difficile" '.($recette->getDifficulte()=='Difficile'?'selected':'').'>Difficile</option>
            </select>
        </div>

        <div>
            <label for="type_cuisine">Type de cuisine:</label>
            <input type="text" id="type_cuisine" name="type_cuisine" value="'.$recette->getTypeCuisine().'" required>
        </div>

        <div class="button-container">
            <button type="submit" class="add-button modifier">Modifier la recette</button>
        </div>
    </div>

    <div id="myModal" class="modal">
        <div class="modal-content">
            <span class="close">&times;</span>
            <h3>Confirmer la mise à jour ?</h3>
            <p>Voulez-vous vraiment modifier la recette : <strong>'.$recette->getNom().'</strong> ?</p>
            <div class="bottom" style="display: flex; justify-content: center; gap: 20px; margin-top: 20px;">
                <button type="submit" id="save" style="background: #28a745; color: white; border: none; padding: 10px 20px; border-radius: 5px; cursor: pointer;">Oui, enregistrer</button>
                <a href="index.php?action=afficher" id="annuler" style="background: #dc3545; color: white; padding: 10px 20px; border-radius: 5px; text-decoration: none;">Annuler</a>
            </div>
        </div>
    </div>
</form>

<script type="text/javascript" src="js/modifier.js"></script>
<script>
    function chooseImage() {
        document.getElementById("image").click();
    }
    
    document.getElementById("image").addEventListener("change", function() {
        const file = this.files[0];
        if (file) {
            const reader = new FileReader();
            reader.onload = function(e) {
                document.getElementById("preview-image").src = e.target.result;
            }
            reader.readAsDataURL(file);
        }
    });
</script>
';

} else {
    echo '<h1>Recette non trouvée</h1>';
}
?>