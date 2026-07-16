<?php
$id = isset($_GET['id']) ? intval($_GET['id']) : 0;
?>

<div class="container" style="text-align:center; background:white; padding:50px; border-radius:20px; max-width:500px; margin:50px auto;">
    <i class='bx bx-trash' style="font-size: 4rem; color: var(--rouge);"></i>
    <h2 style="color:var(--bleu); margin: 20px 0;">Supprimer cette recette ?</h2>
    <p style="margin-bottom:30px;">Cette action est irréversible.</p>
    
    <form action="index.php?action=enregistrer&id=<?php echo $id; ?>" method="POST">
        <input type="hidden" name="action" value="supprimer">
        <div style="display:flex; justify-content: center; gap: 20px;">
            <button type="submit" class="btn-oui" style="border:none; cursor:pointer;">OUI, SUPPRIMER</button>
            <a href="index.php?action=afficher" class="btn-annuler">ANNULER</a>
        </div>
    </form>
</div>