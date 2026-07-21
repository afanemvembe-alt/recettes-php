<div align="center">
  <h1>🍳 Application Web de Recettes Full-Stack</h1>
  <p><b>Application web dynamique orientée MVC pour la gestion et le partage de recettes de cuisine.</b></p>

  <p>
    <a href="https://github.com/afanemvembe-alt/recettes-php">
      <img src="https://img.shields.io/badge/GitHub-Repository-181717?style=for-the-badge&logo=github" alt="Repository Link"/>
    </a>
  </p>
</div>

---

## 📖 À propos du projet

Cette application web full-stack permet d'explorer, créer, modifier et gérer des recettes de cuisine. Conçue selon une **architecture MVC (Modèle-Vue-Contrôleur)** robuste en PHP, elle intègre une base de données relationnelle MySQL et offre une expérience utilisateur fluide grâce à la manipulation dynamique du DOM en JavaScript.

---

## 🛠️ Tech Stack & Compétences

| Catégorie | Technologies Utilisées |
| :--- | :--- |
| **Back-End** | PHP (Architecture MVC / POO) |
| **Base de Données** | MySQL / PostgreSQL (Bases relationnelles, requêtes SQL) |
| **Front-End** | JavaScript (ES6+ / Manipulation du DOM), HTML5, CSS3 |
| **Outils** | Git, GitHub |

---

## ✨ Fonctionnalités Principales

* 🔍 **Recherche & Filtrage :** Exploration dynamique des recettes par ingrédients ou catégories.
* 📝 **Gestion CRUD :** Création, lecture, modification et suppression de recettes.
* 🗄️ **Base de Données Relationnelle :** Modélisation SQL avec relations entre recettes, ingrédients et utilisateurs.
* ⚡ **Interactivité Front-End :** Manipulation du DOM en JavaScript pour une validation de formulaire côté client et des ajouts d'ingrédients dynamiques.

---

## 📁 Architecture du Projet (MVC)

```text
├── config/             # Fichiers de configuration & connexion BDD
├── controllers/        # Logique métier (Contrôleurs PHP)
├── models/             # Modèles de données & requêtes SQL (PDO)
├── views/              # Vues HTML/PHP d'affichage
├── public/             # Fichiers statiques (CSS, JS, Images)
└── index.php           # Routeur principal (Front Controller)
