<?php

echo <<<EOT

<link rel="stylesheet" href="css/ajouter.css">

<form method="post" id="add-formulaire" action="index.php?action=enregistrer" enctype="multipart/form-data" class="form">

    <input type="hidden" value="ajouter" name="action">

    <div class="form-img">
        <figure>
            <img id="preview-image" src="images_recettes/default.jpg" alt="Aperçu" />
        </figure>
        
        <div class="img-btn">
    <a id="btn-img" onclick="chooseImage()">Ajouter une image</a>
    <input type="file" id="image" name="my_image" style="display: none;">
</div>
    </div>

    <div class="form-body">
        <div>
            <label for="nom">Nom:</label>
            <input type="text" id="nom" name="nom" placeholder="Nom de la recette" required>
        </div>

        <div>
            <label for="description">Description:</label>
            <textarea id="description" name="description" placeholder="Description courte" required></textarea>
        </div>

        <div>
            <label for="ingredients">Ingrédients:</label>
            <textarea id="ingredients" name="ingredients" placeholder="Liste des ingrédients" required></textarea>
        </div>

        <div>
            <label for="instructions">Instructions:</label>
            <textarea id="instructions" name="instructions" placeholder="Étapes de préparation" required></textarea>
        </div>

        <div class="row-inputs">
            <div>
                <label for="temps_preparation">Prép (min):</label>
                <input type="number" id="temps_preparation" name="temps_preparation" placeholder="0" required>
            </div>
            <div>
                <label for="temps_cuisson">Cuisson (min):</label>
                <input type="number" id="temps_cuisson" name="temps_cuisson" placeholder="0" required>
            </div>
        </div>

        <div>
            <label for="difficulte">Difficulté:</label>
            <select id="difficulte" name="difficulte">
                <option value="Facile">Facile</option>
                <option value="Moyenne">Moyenne</option>
                <option value="Difficile">Difficile</option>
            </select>
        </div>

        <div>
            <label for="type_cuisine">Type de cuisine:</label>
            <input type="text" id="type_cuisine" name="type_cuisine" placeholder="Ex: Italienne, Africaine..." required>
        </div>

        <div class="button-container">
           <button type="submit" class="add-button">Enregistrer la recette</button>
        </div>

    </div>

</form>

<script type="text/javascript" src="js/ajouter.js"></script>
<script>
    function chooseImage() {
        document.getElementById('image').click();
    }

    document.getElementById('image').addEventListener('change', function () {
        var file = this.files[0];
        if (file) {
            var reader = new FileReader();
            reader.onload = function () {
                document.getElementById('preview-image').src = reader.result;
            }
            reader.readAsDataURL(file);
        }
    });
</script>

EOT;
?>