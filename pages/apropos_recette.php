<?php
echo <<<EOT
<div class="container" style="max-width: 1000px;">
    <div style="text-align: center; margin-bottom: 40px;">
        <h2 style="margin-bottom: 10px;">À propos du Projet</h2>
        <p style="color: #666;">Nicole Gastronomie - Plateforme de Gestion Culinaire</p>
    </div>

    <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(300px, 1fr)); gap: 25px;">
        
        <div style="background: white; padding: 25px; border-radius: 15px; border-top: 5px solid var(--bleu); box-shadow: 0 10px 20px rgba(0,0,0,0.05);">
            <div style="display: flex; align-items: center; margin-bottom: 15px;">
                <i class='bx bxs-user-badge' style="font-size: 2rem; color: var(--bleu); margin-right: 15px;"></i>
                <h3 style="color: var(--bleu);">Étudiante</h3>
            </div>
            <p style="margin: 8px 0;"><strong>Nom :</strong> AFANE</p>
            <p style="margin: 8px 0;"><strong>Prénom :</strong> MVEMBE NICOLE MANUELLA</p>
            <p style="margin: 8px 0;"><strong>N° Étudiant :</strong> <span style="color: var(--rouge); font-weight: bold;">22511924</span></p>
            <p style="margin: 8px 0;"><strong>Groupe :</strong> 3B</p>
        </div>

        <div style="background: white; padding: 25px; border-radius: 15px; border-top: 5px solid var(--vert); box-shadow: 0 10px 20px rgba(0,0,0,0.05);">
            <div style="display: flex; align-items: center; margin-bottom: 15px;">
                <i class='bx bxs-check-circle' style="font-size: 2rem; color: var(--vert); margin-right: 15px;"></i>
                <h3 style="color: var(--vert);">Réalisations</h3>
            </div>
            <ul style="list-style: none; padding: 0; font-size: 0.9rem;">
                <li style="margin-bottom: 8px;"><i class='bx bx-check' ></i> CRUD Complet (POO & PDO)</li>
                <li style="margin-bottom: 8px;"><i class='bx bx-check' ></i> Utilisation de FETCH_CLASS</li>
                <li style="margin-bottom: 8px;"><i class='bx bx-check' ></i> Filtrage dynamique des données</li>
                <li style="margin-bottom: 8px;"><i class='bx bx-check' ></i> Gestion des uploads d'images</li>
            </ul>
        </div>

        <div style="background: white; padding: 25px; border-radius: 15px; border-top: 5px solid #6c757d; box-shadow: 0 10px 20px rgba(0,0,0,0.05);">
            <div style="display: flex; align-items: center; margin-bottom: 15px;">
                <i class='bx bxs-info-circle' style="font-size: 2rem; color: #6c757d; margin-right: 15px;"></i>
                <h3 style="color: #6c757d;">Sources</h3>
            </div>
            <p style="font-size: 0.9rem; margin-bottom: 10px;">
                <strong>Images :</strong> Les illustrations des recettes proviennent de la plateforme <strong>Freepik</strong>.
            </p>
            <p style="font-size: 0.9rem; margin-bottom: 10px;">
                <strong>Icônes :</strong> Boxicons v2.1.4.
            </p>
            <p style="font-size: 0.9rem;">
                <strong>Textes :</strong> Contenus originaux et inspirations culinaires.
            </p>
        </div>

    </div>

    <div style="text-align: center; margin-top: 50px;">
        <p style="font-size: 0.8rem; color: #999; margin-bottom: 20px;">Projet réalisé dans le cadre du TP 10 - Développement Web PHP</p>
        <a href="index.php?action=accueil" class="btn-oui" style="text-decoration: none; display: inline-block;">Retour à l'accueil</a>
    </div>
</div>
EOT;
?>